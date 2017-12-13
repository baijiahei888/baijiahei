<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\WkcMine;
class wkcCaiJi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wkcCaiJi:wkcCaiJi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'wan ke yun cai ji';

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
        $client = new Client();
        $response = json_decode($client->request('POST', 'http://account.onethingpcs.com/info/query')->getBody()->getContents());
        $disk =  $response->data->average_disk; //disk
        $width = $response->data->average_bandwidth;
        $onlineTime =  $response->data->average_onlinetime;
        $height = $response->data->block_num;
        $wkb_num =  $response->data->wkb_num;

        $res = WkcMine::where('id',1)->update([
                'name' => "wkc",
                'count' => $wkb_num,
                'height' => $height,
                'onlineTime' => $onlineTime,
                'width' => $width,
                'disk' => $disk,
            ]);
        
    }
}
