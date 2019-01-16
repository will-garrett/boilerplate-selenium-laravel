<?php

namespace App\Http\Controllers;

use App\github;
use Illuminate\Http\Request;
use GuzzleHttp\Client as Guzzler;

class GithubController extends Controller
{
    protected $client;

    public function __construct(){
        $this->client = new Guzzler(
            [
                'base_uri' => 'https://api.github.com',
                
            ]
        );
    }
    public function user_info(){
        $result = $this->client->request('GET', '/user', ['auth' => [getenv('GITHUB_USER'), getenv('GITHUB_TOKEN')]]);
        $body = $result->getBody();
        $user_info = json_decode($body, 1);
        return $user_info;
    }
    public function repos(){
        try{
            $result = $this->client->request('GET', '/user/repos', ['auth' => [getenv('GITHUB_USER'), getenv('GITHUB_TOKEN')]]);
            $body = $result->getBody();
            $repos = json_decode($body, 1);
            $user_repos = [];
            foreach($repos as $repo){
               if($repo['fork'] == false){
                   $user_repos[]=[
                       'name'=>$repo['name'],
                       'url'=>$repo['html_url'],
                       'description'=>$repo['description'],
                       'private'=>$repo['private'],
                       'language'=>$repo['language'],
                       'created_at'=>$repo['created_at'],
                       'updated_at'=>$repo['updated_at']
                   ];
               }
            }
            return $user_repos;
        }
        catch(Exception $e){
            return $e;
        }
        //
        
    }
}
