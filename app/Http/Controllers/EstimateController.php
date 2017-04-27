<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Library\Appertunity\Cocomo2;
use Library\Appertunity\Cocomo;
class EstimateController extends Controller
{
    //

    public function index(){
        return view('estimate.intermediate',[]);
    }

    function doCalculate(Request $request){
        $options = array(
            'sloc' => $request->sloc,   // Source lines of code (required)
            'class' => $request->class, // Project class
            //PRODUCT
            'rely'  => $request->rely,  // Required software reliability
            'data' => $request->data,  // Size of application database
            'cplx' => $request->cplx,  // Complexity of the product
            /*HARDWARE OR PLATFORM*/
            'time' => $request->time,  // Run-time performance constraints
            'stor' => $request->stor,  // Memory constraints
            'virt' => $request->virt,  // Volatility of the virtual machine environment
            'turn' => $request->turn,  // Required turnabout time
            /*Personal*/
            'acap' => $request->acap,  // Analyst capability
            'aexp' => $request->aexp,  // Applications experience
            'pcap' => $request->pcap,  // Software engineer capability
            'vexp' => $request->vexp,  // Virtual machine experience
            'lexp' => $request->lexp,  // Programming language experience
            /*Project*/
            'modp' => $request->modp,  // Application of software engineering methods
            'tool' => $request->tool,  // Use of software tools
            'sced' => $request->sced   // Required development schedule
        );

        $isValidParams = isset($options['sloc']);
        if (!$isValidParams) {
                echo ' Error: SLOC is required!';
            exit;
        }
        $projectClass = $options['class'];
        try {
            $cocomo2 = new Cocomo2($projectClass, $options);
            $sloc = (int) $options['sloc'];
            $estimation = $cocomo2->estimate($sloc);
            foreach ($estimation as $k => $e) {
               $json[$k] = $e;
            }
        }
        catch(\Exception $e) {
            $json['exception'] =  $e->getMessage();
        }
        echo json_encode($json);

    }

    public function Basic(){
        
        return view('estimate.basic',[]);

    }
    public function doBasic(Request $request){
        $options = array(
            'sloc' => $request->sloc,   // Source lines of code (required)
            'class' => $request->class, // Project class
        );

        $isValidParams = isset($options['sloc']);
        if (!$isValidParams) {
            echo ' Error: SLOC is required!';
            exit;
        }
        $projectClass = $options['class'];
        try {
            $cocomo = new Cocomo($projectClass, $options);
            $sloc = (int) $options['sloc'];
            $estimation = $cocomo->estimate($sloc);
            foreach ($estimation as $k => $e) {
                $json[$k] = $e;
            }
        }
        catch(\Exception $e) {
            $json['exception'] =  $e->getMessage();
        }
        echo json_encode($json);


    }
}
