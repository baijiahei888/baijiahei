<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Info;
class wkchangqing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wkchangqing:wkchangqing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 't.miguan.in';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $urls = 'https://x.miguan.in/otc/v7/monitorRecordList?orderBy=turnover';
        $headers = ['User-Agent' => 'testing/1.0'];

        $client = new Client();
        $response = $client->request('get',$urls,[
            'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36'
            ]])->getBody()->getContents();

        Info::create([
            "jsoninfos"=>$response,
            ]);
    }
}
