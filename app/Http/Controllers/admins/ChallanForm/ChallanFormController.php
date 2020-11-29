<?php

namespace App\Http\Controllers\admins\ChallanForm;

use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;

use Illuminate\Http\Request;

class ChallanFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdf = new FPDF('p','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();

        /*output the result*/

        /*set font to arial, bold, 14pt*/
        $pdf->SetY(10);
        $pdf->SetFont('Arial','',10);
        $path = public_path() . '/challanform/download.jpg';

//        $filepath = $path . $company->logo;

        if(file_exists($path)) {
            $pdf->Image($path,'20','8','35','35');
        }

//upper cell with border

        /*end of line*/
//Array for another loop
        $pdf->SetDrawColor(218,213,210);
        $pdf->Rect(70, 10, 60, 15, 'D');
        $account=['Credit MCB Bank Ltd','Account #00983454','MCB,UBL Omni,HBL Konnect'];
        $i = 0;
        for($i =0;$i<3;$i++)
        {
            $pdf->SetX(70);
            $pdf->Cell(60 ,5,$account[$i],0,1,'L');
        }
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetTextColor(0,0,0);
        $pdf->setFillColor(218,213,210);
        /*end of line*/
//Array for another loop
        $pdf->SetX(65);
        $pdf->SetY(27);
        $pdf->Cell('70',4,'',0);
        $account=['Account Contact','Due Date','Fine Per Day'];
        $details=['0003422312','2-Nov-2020','Rs.40'];
        $i = 0;
        while($i<count($account))
        {
            $pdf->SetX(70);
            $pdf->Cell(30 ,4,$account[$i],0,0,'L',1);
            $pdf->Cell(30 ,4,$details[$i],0,1,'L',1);
            $i++;
        }
//table
        $pdf->SetLeftMargin(140);
        $pdf->SetY(10);

        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(60 ,6,'SHEHARYAR KHAN',1,1,'C',1);
        /*end of line*/
//Array for another loop
        $Description=["Month", "Student ID", "Branch","Section"];
        $Date=['November','09383','TSB','KG1 Blue'];
        $pdf->SetFont('Arial','',10);
        $i = 0;
        while($i<count($Description))
        {
            $pdf->setFillColor(120,173,181);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(30 ,6,$Description[$i],1,0,'L',1);
            $pdf->setFillColor(218,213,210);
            $pdf->SetTextColor(0,0,0);
            $pdf->Cell(30 ,6,$Date[$i],1,1,'L',1);
            $i++;
        }
        $pdf->cell('23',4,'',0,1);
        $pdf->SetX(10);
        $pdf->SetFont('Arial','B',10);
//table heading
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(120 ,6,'Previous History',1,0,'C',1);
        $pdf->Cell(10 ,6,'',0,1,'C');
        $pdf->SetTextColor(0,0,0);
        /*Heading Of the table*/
        $pdf->setFillColor(229,223,209);
        $pdf->SetX(10);

        $pdf->Cell(20 ,6,'Date',1,0,'C',1);
        $pdf->Cell(50 ,6,'Description',1,0,'C',1);
        $pdf->Cell(20 ,6,'Debit',1,0,'C',1);
        $pdf->Cell(15 ,6,'Credit',1,0,'C',1);
        $pdf->Cell(15 ,6,'Balance',1,1,'C',1);
        /*end of line*/
        $pdf->SetFont('Arial','',10);
        for ($i = 0; $i <= 9; $i++) {
            $pdf->SetX(10);
            $pdf->Cell(20 ,6,'0/0',1,0,'C',1);
            $pdf->Cell(50 ,6,'Current Month Total',1,0,'c',1);
            $pdf->Cell(20 ,6,'0/0',1,0,'R',1);
            $pdf->Cell(15 ,6,'0/0',1,0,'R',1);
            $pdf->Cell(15 ,6,'0/0',1,1,'R',1);
        }
//set left margin and sety to up the cell
        $pdf->SetLeftMargin(140);
        $pdf -> SetY(44);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(60 ,6,'Student Copy',1,1,'C',1);
        /*Heading Of the table*/
        $pdf->SetTextColor(0,0,0);
        $pdf->setFillColor(229,223,209);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30 ,6,'Description',1,0,'C',1);
        $pdf->Cell(30 ,6,'Amount',1,1,'C',1);
        /*end of line*/
//Array for another loop
        $pdf->SetFont('Arial','',10);
        $Description=["Admission Fee", "Security", "Exam Fee","Computer Utility","Admission Fee", "Security", "Exam Fee","Computer Utility","Security", "Exam Fee"];
        $Date=['0/0','0/0','0/0','0/0','0/0','0/0','0/0','0/0','0/0','0/0'];
        $pdf->SetFont('Arial','',10);
        $i = 0;
        while($i<count($Description))
        {
            $pdf->Cell(30 ,6,$Description[$i],1,0,'R',1);
            $pdf->Cell(30 ,6,$Date[$i],1,1,'R',1);
            $i++;
        }
//line break
        $pdf->SetX(10);
//student copy
        $pdf->SetFont('Arial','',8);
        for($i=0;$i<=37;$i++)
        {
            $pdf->cell('5',10,'---',0,0);
        }
        $pdf->cell('5',15,'',0,1);
//Image logo
        $path = public_path() . '/challanform/download.jpg';

//        $filepath = $path . $company->logo;

        if(file_exists($path)) {
            $pdf->Image($path,'10','133','18','20');
        }
        $pdf->SetX(30);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetDrawColor(255, 255, 255);
        $pdf->cell('100',7,'SHEHARYAR KHAN','B','1','C',1);
//$pdf->SetX(30);
//$pdf->cell('100',2,'ffe','1','0');
        $pdf->SetX(30);
        $pdf->cell('25',7,'Month','B','0','L',1);
        $pdf->setFillColor(218,213,210);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell('25',7,'November','B','0','L',1);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->cell('25',7,'Branch','B','0','L',1);
        $pdf->setFillColor(218,213,210);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell('25',7,'TSB','B','1','L',1);
        $pdf->SetX(30);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->cell('25',6,'Student ID','B','0','L',1);
        $pdf->setFillColor(218,213,210);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell('25',6,'04525','B','0','L',1);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->cell('25',6,'Section','B','0','L',1);
        $pdf->setFillColor(218,213,210);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell('25',6,'KG-1 Blue','B','1','L    ',1);
//Account details
        $pdf->SetY(130);
        $pdf->SetTextColor(0,0,0);
        $pdf->setFillColor(218,213,210);
        /*end of line*/
//Array for another loop
        $account=['Account Contact','Due Date','Fine Per Day'];
        $details=['0003422312','2-Nov-2020','Rs.40'];
        $i = 0;
        while($i<count($account))
        {
            $pdf->Cell(30 ,7,$account[$i],0,0,'L',1);
            $pdf->Cell(30 ,7,$details[$i],0,1,'L',1);
            $i++;
        }
//line break
        $pdf->cell('15',2,'',0,1);
        $pdf->SetX(10);
        $pdf->setFillColor(120,173,181);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell('190',7,'School Copy','0','1','C',1);
        $pdf->SetX(10);
//portion
        $pdf->setFillColor(255,248,220);
        /*end of line*/
        $pdf->SetX(10);
        $pdf->SetFont('Arial','',8);
        $pdf->setFillColor(148,161,197);
        $pdf->Cell('25','7','Admission fee','1','0','C',1);
        $pdf->Cell('15','7','Security','1','0','C',1);
        $pdf->Cell('20','7','Exam fee','1','0','C',1);
        $pdf->Cell('30','7','Computer Utility','1','0','C',1);
        $pdf->Cell('40','7','Stationary /Science Lab','1','0','C',1);
        $pdf->Cell('40','7','Current Month Total','1','0','C',1);
        $pdf->Cell('20','7','Installment','1','1','C',1);
        $pdf->SetX(10);
        $pdf->setFillColor(218,213,210);
        $pdf->Cell('25','8','','1','0','C',1);
        $pdf->Cell('15','8','','1','0','C',1);
        $pdf->Cell('20','8','','1','0','C',1);
        $pdf->Cell('30','8','','1','0','C',1);
        $pdf->Cell('40','8','','1','0','C',1);
        $pdf->Cell('40','8','','1','0','C',1);
        $pdf->Cell('20','8','','1','1','C',1);
//Another portion
//portion
        $pdf->setFillColor(148,161,197);
        /*end of line*/
        $pdf->SetX(10);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell('25','7','Admission fee','1','0','C',1);
        $pdf->Cell('15','7','Security','1','0','C',1);
        $pdf->Cell('20','7','Exam fee','1','0','C',1);
        $pdf->Cell('30','7','Computer Utility','1','0','C',1);
        $pdf->Cell('20','7','Misc2','1','0','C',1);
        $pdf->Cell('20','7','Misc2','1','0','C',1);
        $pdf->Cell('40','7','Current Month Total','1','0','C',1);
        $pdf->Cell('20','7','Installment','1','1','C',1);
        $pdf->SetX(10);
        $pdf->setFillColor(218,213,210);
        $pdf->Cell('25','8','','1','0','C',1);
        $pdf->Cell('15','8','','1','0','C',1);
        $pdf->Cell('20','8','','1','0','C',1);
        $pdf->Cell('30','8','','1','0','C',1);
        $pdf->Cell('40','8','','1','0','C',1);
        $pdf->Cell('40','8','','1','0','C',1);
        $pdf->Cell('20','8','','1','1','C',1);
        $pdf->SetX(10);
//bank copy
        $pdf->SetFont('Arial','',8);
        for($i=0;$i<=37;$i++)
        {
            $pdf->cell('5',10,'---',0,0);
        }
        $pdf->cell('5',10,'',0,1);
//Image logo
        $path = public_path() . '/challanform/download.jpg';

//        $filepath = $path . $company->logo;

        if(file_exists($path)) {
            $pdf->Image($path,'10','202','18','20');
        }
        $pdf->SetX(30);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetDrawColor(255, 255, 255);
        $pdf->cell('100',7,'SHEHARYAR KHAN','B','1','C',1);
//$pdf->SetX(30);
//$pdf->cell('100',2,'ffe','1','0');

        $pdf->SetX(30);
        $pdf->cell('25',7,'Month','B','0','L',1);
        $pdf->setFillColor(218,213,210);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell('25',7,'November','B','0','L',1);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->cell('25',7,'Branch','B','0','L',1);
        $pdf->setFillColor(218,213,210);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell('25',7,'TSB','B','1','L',1);
        $pdf->SetX(30);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->cell('25',6,'Student ID','B','0','L',1);
        $pdf->setFillColor(218,213,210);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell('25',6,'04525','B','0','L',1);
        $pdf->setFillColor(120,173,181);
        $pdf->SetTextColor(255,255,255);
        $pdf->cell('25',6,'Section','B','0','L',1);
        $pdf->setFillColor(218,213,210);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell('25',6,'KG-1 Blue','B','1','L    ',1);
//Account details
        $pdf->SetY(200);
        $pdf->SetTextColor(0,0,0);
        $pdf->setFillColor(218,213,210);
        /*end of line*/
//Array for another loop
        $account=['Account Contact','Due Date','Fine Per Day'];
        $details=['0003422312','2-Nov-2020','Rs.40'];
        $i = 0;
        while($i<count($account))
        {
            $pdf->Cell(30 ,7,$account[$i],0,0,'L',1);
            $pdf->Cell(30 ,7,$details[$i],0,1,'L',1);
            $i++;
        }
//line break
        $pdf->cell('15',2,'',0,1);
        $pdf->SetX(10);
        $pdf->setFillColor(120,173,181);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell('190',7,'Bank Copy','0','1','C',1);
        $pdf->SetX(10);
//portion
        $pdf->setFillColor(255,248,220);
        /*end of line*/
        $pdf->SetX(10);
        $pdf->SetFont('Arial','',8);
        $pdf->setFillColor(148,161,197);
        $pdf->Cell('25','7','Admission fee','1','0','C',1);
        $pdf->Cell('15','7','Security','1','0','C',1);
        $pdf->Cell('20','7','Exam fee','1','0','C',1);
        $pdf->Cell('30','7','Computer Utility','1','0','C',1);
        $pdf->Cell('40','7','Stationary /Science Lab','1','0','C',1);
        $pdf->Cell('40','7','Current Month Total','1','0','C',1);
        $pdf->Cell('20','7','Installment','1','1','C',1);
        $pdf->SetX(10);
        $pdf->SetFont('Arial','',8);
        $pdf->setFillColor(218,213,210);
        $pdf->Cell('25','8','','1','0','C',1);
        $pdf->Cell('15','8','','1','0','C',1);
        $pdf->Cell('20','8','','1','0','C',1);
        $pdf->Cell('30','8','','1','0','C',1);
        $pdf->Cell('40','8','','1','0','C',1);
        $pdf->Cell('40','8','','1','0','C',1);
        $pdf->Cell('20','8','','1','1','C',1);
//Another portion
//portion
        $pdf->setFillColor(148,161,197);
        /*end of line*/
        $pdf->SetX(10);
        $pdf->Cell('25','7','Admission fee','1','0','C',1);
        $pdf->Cell('15','7','Security','1','0','C',1);
        $pdf->Cell('20','7','Exam fee','1','0','C',1);
        $pdf->Cell('30','7','Computer Utility','1','0','C',1);
        $pdf->Cell('20','7','Misc2','1','0','C',1);
        $pdf->Cell('20','7','Misc2','1','0','C',1);
        $pdf->Cell('40','7','Current Month Total','1','0','C',1);
        $pdf->Cell('20','7','Installment','1','1','C',1);
        $pdf->SetX(10);
        $pdf->setFillColor(218,213,210);
        $pdf->Cell('25','8','','1','0','C',1);
        $pdf->Cell('15','8','','1','0','C',1);
        $pdf->Cell('20','8','','1','0','C',1);
        $pdf->Cell('30','8','','1','0','C',1);
        $pdf->Cell('40','8','','1','0','C',1);
        $pdf->Cell('40','8','','1','0','C',1);
        $pdf->Cell('20','8','','1','1','C',1);
        $pdf->SetX(10);
//Another table heading
//$pdf->Cell(20 ,6,'Previous History',1,1,'C');

//$pdf->Cell(40,18,'Words Here', 1,0, 'C');
//$x = $pdf->GetX();
//$pdf->Cell(40,6,'Words Here', 1,0);
//$pdf->Cell(40,6,'Words Here', 1,1);
//$pdf->SetX($x);
//$pdf->Cell(40,6,'[x] abc', 1,0);
//$pdf->Cell(40,6,'[x] Checkbox 1', 1,1);
//$pdf->SetX($x);
//$pdf->Cell(40,6,'[x] def', 1,0);
//$pdf->Cell(40,6,'[x] Checkbox 1', 1,1);

        $pdf->Output();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
