<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\OAuth2\Client\Provider\GenericProvider;
use Microsoft\Graph\Graph;

class AuthController extends Controller
{
    public function login()
    {
        $oauthClient = new GenericProvider([
            'clientId'                => config('azure.appId'),
            'clientSecret'            => config('azure.appSecret'),
            'redirectUri'             => route('callback'),
            'urlAuthorize'            => config('azure.authority').config('azure.authorizeEndpoint'),
            'urlAccessToken'          => config('azure.authority').config('azure.tokenEndpoint'),
            'urlResourceOwnerDetails' => '',
            'scopes'                  => config('azure.scopes')
        ]);

        $authUrl = $oauthClient->getAuthorizationUrl();

        session(['oauthState' => $oauthClient->getState()]);

        return redirect()->away($authUrl);
    }

    public function callback(Request $request)
    {
        $expectedState = session('oauthState');
        $request->session()->forget('oauthState');
        $providedState = $request->query('state');

        if (!isset($expectedState)) {
            return redirect('/');
        }

        if (!isset($providedState) || $expectedState != $providedState) {
            return redirect('/')
                ->with('error', 'Invalid auth state')
                ->with('errorDetail', 'The provided auth state did not match the expected value');
        }

        $authCode = $request->query('code');

        if (isset($authCode)) {
            $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
                'clientId'                => config('azure.appId'),
                'clientSecret'            => config('azure.appSecret'),
                'redirectUri'             => route('callback'),
                'urlAuthorize'            => config('azure.authority').config('azure.authorizeEndpoint'),
                'urlAccessToken'          => config('azure.authority').config('azure.tokenEndpoint'),
                'urlResourceOwnerDetails' => '',
                'scopes'                  => config('azure.scopes')
            ]);

            try {
                $accessToken = $oauthClient->getAccessToken('authorization_code', [
                    'code' => $authCode
                ]);

                $graph = new Graph();
                $graph->setAccessToken($accessToken->getToken());

                $account = $graph->createRequest('GET', '/me')
                    ->setReturnType(\Microsoft\Graph\Model\User::class)
                    ->execute();

                $user = User::where('email', $account->getMail())->first();

                if (!$user) {
                    $user = new User();
                    $user->name = $account->getDisplayName();
                    $user->email = $account->getMail();
                    $user->password = Hash::make(bin2hex(random_bytes(2)));
                    $user->save();

                    $user = User::where('email', $account->getMail())->first();

                    $user->ownedTeams()->save(Team::forceCreate([
                        'user_id' => $user->id,
                        'name' => 'Personnel',
                        'personal_team' => true,
                    ]));
                }

                Auth::loginUsingId($user->id);

                return redirect(route('dashboard'));
            }
            catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
                dd($e);
                return redirect('/')
                    ->with('error', 'Error requesting access token')
                    ->with('errorDetail', json_encode($e->getResponseBody()));
            }
        }

        return redirect('/')
            ->with('error', $request->query('error'))
            ->with('errorDetail', $request->query('error_description'));
    }

    public function logout()
    {
        session()->flush();

        return redirect('/?goodbye');
    }
}
