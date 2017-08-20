<?php

namespace App\Http\Controllers;

use App\Setting;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
		public function __construct(PDF $pdf) {
			$this->pdf = $pdf;
		}
		public function pers() {
			$setting = Setting::all();
			$arrset = array();
			foreach ($setting as $item) {
				$arrset[$item['name']] = $item['value'];
			}
			$fpdf = $this->pdf;
			$fpdf->setOptions(['defaultFont' => 'dejavu sans']);
			$fpdf->setPaper('A4');
			$fpdf->loadView('pdf.pers', ['setting' => $arrset]);
			return $fpdf->stream('Согласие пользователя на обработку персональных данных.pdf');

		}
		public function conf() {
			$setting = Setting::all();
			$arrset = array();
			foreach ($setting as $item) {
				$arrset[$item['name']] = $item['value'];
			}
			$fpdf = $this->pdf;
			$fpdf->setOptions(['defaultFont' => 'dejavu sans']);
			$fpdf->setPaper('A4');
			$fpdf->loadView('pdf.conf', ['setting' => $arrset]);
			return $fpdf->stream('Политика конфиденциальности.pdf');
		}
}
