<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Coba extends CI_Controller {
     
    public function pie()
    {
        $this->load->library('jpgraph');
		//$this->load->view('pie');
		$bar_graph = $this->jpgraph->pie();
		$datax = array(2,10,20);
		$datay = array("rendah","sedang","bagus");
		$graph = new PieGraph(400,270,"auto");
		$graph->SetScale('textint');
		$graph->img->SetMargin(50,30,70,100);
		$graph->SetShadow();
		$bplot = new PiePlot3D($datax);
		$bplot->SetCenter(0.45,0.40);
		$bplot->SetLegends($datay);
		$bplot->value->Show();
		$bplot->value->SetFont(FF_ARIAL,FS_BOLD);
		$graph->Add($bplot);
		$graph->Stroke();
    }
	public function bar()
    {
        $this->load->library('jpgraph');
		$bar_graph = $this->jpgraph->bar();
		
		$graph = new Graph(600, 300);
		
		$graph->title->Set("Grafik Keaktifan Driver");
		$graph->title->SetFont(FF_VERDANA,FS_BOLD,10);
		$graph->subtitle->Set("PT PJB Services");

		$graph->SetScale('textlin');
		 
		$data = array(31, 17, 23, 15, 10,);
		$datax = array("anggit","duwi","doni","agung","adul",);
		$graph->xaxis->SetTickLabels($datax);
		$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,8);
		
		$bar = new BarPlot($data);
		$graph->Add($bar);
		//$graph->Stroke();
		
		$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
		$fileName = "./asset/images/grafik/contoh.png";
		$graph->img->Stream($fileName);
 
		// Send it back to browser
		$graph->img->Headers();
		$graph->img->Stream();
    }
}