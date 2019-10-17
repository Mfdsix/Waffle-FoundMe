<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser as Pdf;
use Session;

class PdfReaderController extends Controller
{
	public function search(Request $request){
		if(isset($request->word) && $request->word != ""){
			try{
				$parser = new Pdf();
				$pdf = $parser->parseFile(public_path().'/example.pdf');
				$text = $pdf->getText();

				if(strpos(strtolower($text), strtolower($request->word))){
					return "🥳 Yahooo... I found ".substr_count(strtolower($text),strtolower($request->word)).' <i>"'.$request->word.'"</i>';
				}else if(strtolower($request->word) == "mfdsix" || strtolower($request->word) == "mahfudz"){
					return "<b>😍 Love you ... ♥♥♥</b>";
				}
				else{
					return "😑 Hufft... I can't find your ".'<i>"'.$request->word.'"</i>';
				}
			}catch(Exception $e){
				return "🙄 Oops.. Operation Failed";
			}
		}else{
			return "😏 Emm, don't you forget something ?";
		}
	}
}
