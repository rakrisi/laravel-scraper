<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    private $results = array();

    public function scraper()
    {
        $client = new Client();
        // $url = 'https://www.worldometers.info/coronavirus/';
        // $page = $client->request('GET', $url);

        // /*echo "<pre>";
        // print_r($page);*/

        // // echo $page->filter('.maincounter-number')->text();

        // $page->filter('#maincounter-wrap')->each(function ($item) {
        //     $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
        // });

        // $data = $this->results;
        // //return view('scraper', compact('data'));
        // var_dump($data);
        $url = 'https://www.menuwithprice.com/nutrition/';
        $page = $client->request('GET', $url);

        /*echo "<pre>";
        print_r($page);*/

        // echo $page->filter('.maincounter-number')->text();

        $page->filter('li > a')->each(function ($item) {
            $this->results[$item->attr('href')] = $item->filter('a')->text();
        });

        $data = $this->results;
        //return view('scraper', compact('data'));
        dd($data);
    }
}
