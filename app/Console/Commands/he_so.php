<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class he_so extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'he_so';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $collection= DB::select("select ma_giang_vien,count(thangNam) as demThangDiLam from (select DISTINCT ma_giang_vien,date_format(ngay,'%Y-%m') as thangNam from cham_cong)a GROUP BY ma_giang_vien  HAVING demThangDiLam>=3");

        for ($i=0; $i <count($collection) ; $i++) { 
            $he_so=(floor(($collection[$i]->demThangDiLam)/3)*0.1)+1;
            DB::table("giang_vien")->where('ma_giang_vien','=',$collection[$i]->ma_giang_vien)->update(['he_so'=>$he_so]);
        }
    }
}
