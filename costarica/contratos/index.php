<?php



require_once('../functions.php'); /*Funciones*/

if(isset($_GET["data"]))

{



	if($_GET["data"] != "")

	{

		/*vars*/

		$email = base64_decode($_GET["data"]);

		/*vars*/



		//echo('id_contract: '.$email);



		$queryResult = $pdo->prepare("SELECT t0.id_contract, t0.country, t0.code, t0.name, t0.type, t0.type_incorporate, t0.type_sponsor, t0.sponsor, t0.email, t0.cellular, t0.birthday, t0.address, t0.residency_one, t0.residency_two, t0.residency_three, t0.residency_four, t0.name_legal_representative, t0.type_document, t0.number_document, t0.rfc, t0.name_cotitular, t0.type_document_cotitular, t0.number_document_cotitular, t0.bank, bank_type, t0.number_account, t0.number_clabe, t0.payment, t0.create_at, t0.update_at, t0.user_approved, t0.status, CASE WHEN t1.name is null THEN '-' ELSE t1.name END as type_document_name, t2.name as residency_two_name, t4.name as type_document_cotitular_name, t0.ip, t0.browser, t5.nombre as name_sponsor, t5.correo as email_sponsor, t5.celular as cellular_sponsor, t6.name as bank_name, t7.name as bank_type_name FROM contracts t0 left join citys t2 on t0.residency_two = t2.code and t0.country = t2.country left join nikkenla_marketing.control_ci_test t5 on t0.sponsor = t5.codigo left join nikkenla_office.control_banks t6 on t0.bank = t6.id_bank left join nikkenla_office.control_banks_type t7 on t0.bank_type = t7.id_bank_type left join type_documents t1 on t0.type_document = t1.id_type left join type_documents t4 on t0.type_document_cotitular = t4.id_type where t0.id_contract = :email");

		$queryResult->execute(array(':email' => $email));

		$done = $queryResult->fetch();

		if($done)

		{

			$id_contract = $done["id_contract"];



			$country = $done["country"];

			$country_letter = Country_letter($country, 1);

			$country_abrev = Country_letter($country, 2);



			$code = $done["code"];

			$name = $done["name"];

			$type = $done["type"];

			$type_incorporate = $done["type_incorporate"];

			$type_sponsor = $done["type_sponsor"];

			$sponsor = $done["sponsor"];

			$email = $done["email"];

			$cellular = $done["cellular"];

			$birthday = obtenerFechaEnLetra(substr($done["birthday"], 0, 10));

			$address = $done["address"];

			$residency_one = $done["residency_one"];

			$residency_two = $done["residency_two"];

			$residency_three = $done["residency_three"];

			$residency_four = $done["residency_four"];

			$name_legal_representative = $done["name_legal_representative"];

			$type_document = $done["type_document"];

			$number_document = $done["number_document"];

			$rfc = $done["rfc"];

			if($rfc == "0"){ $rfc = ""; }

			$name_cotitular = $done["name_cotitular"];

			$type_document_cotitular = $done["type_document_cotitular"];

			$number_document_cotitular = $done["number_document_cotitular"];

			$bank = $done["bank"];

			$bank_type = $done["bank_type"];

			$number_account = $done["number_account"];

			$number_clabe = $done["number_clabe"];

			$payment = $done["payment"];

			$create_at = $done["create_at"];

			$update_at = $done["update_at"];

			$user_approved = $done["user_approved"];

			$status = $done["status"];

			$type_document_name = $done["type_document_name"];

			$residency_two_name = $done["residency_two_name"];

			$type_document_cotitular_name = $done["type_document_cotitular_name"];

			$ip = $done["ip"];

			$browser = $done["browser"];

			$name_sponsor = $done["name_sponsor"];

			$email_sponsor = $done["email_sponsor"];

			$cellular_sponsor = $done["cellular_sponsor"];

			$bank_name = $done["bank_name"];

			$bank_type_name = $done["bank_type_name"];



			$text_header = "SOLICITUD DE INSCRIPCIÓN COMO ASESOR DE BIENESTAR Y CONTRATO";

			$text0 = "Asesor de Bienestar";

			$text1 = "Apellidos y nombres";

			$text2 = "Fecha de nacimiento";

			$text3 = "Número de documento";

			$text4 = "";

			$text5 = "Departamento";

			$text6 = "Ciudad";

			$text7 = "";

			$text8 = "Número de cuenta";

			$text9 = "CCI";



			if($country == 8)

			{

				$text8 = "Número de cuenta bancaria cliente";

				$text9 = "Cédula de propietario de cuenta";	

			}



			if($country == 1)

			{

				$text4 = "";

				$text5 = "Departamento";

				$text6 = "Ciudad";

				$text7 = "";

			}

			if($country == 2)

			{

				$text4 = "Código postal";

				$text5 = "Estado";

				$text6 = "Municipio";

				$text7 = "Colonia";

			}

			if($country == 3)

			{

				$text4 = "";

				$text5 = "Departamento";

				$text6 = "Provincia";

				$text7 = "";

			}

			if($country == 4)

			{

				$text4 = "";

				$text5 = "Provincia";

				$text6 = "Ciudad";

				$text7 = "";

			}

			if($country == 5)

			{

				$text4 = "";

				$text5 = "Ciudad";

				$text6 = "Provincia";

				$text7 = "";

			}

			if($country == 6)

			{

				$text4 = "";

				$text5 = "Departamento";

				$text6 = "Ciudad";

				$text7 = "Municipio";

			}

			if($country == 7)

			{

				$text4 = "";

				$text5 = "Departamento";

				$text6 = "Ciudad";

				$text7 = "";

			}

			if($country == 8)

			{

				$text4 = "";

				$text5 = "Provincia";

				$text6 = "Cantón";

				$text7 = "";

			}



			if($type == 0)

			{

				$text_header = "SOLICITUD DE INSCRIPCIÓN COMO CLUB DE BIENESTAR Y CONTRATO";

				$text0 = "Club de Bienestar";

			}



			if($type_incorporate == 0)

			{

				$text1 = "Nombre de la empresa";

				$text2 = $text2 . " del representante legal";

				if($country == 1)

				{

					$text3 = "Número de Identificación Tributaria";

				}

				if($country == 2)

				{

					$text3 = "Registro Federal de Contribuyentes (RFC)";

				}

				if($country == 3 || $country == 4 || $country == 5)

				{

					$text3 = "Número de Identificación (RUC)";

				}

                if($country == 6 || $country == 7)

                {

                    $text3 = "Número de Identificación (NIT)";

                }

                if($country == 8)

                {

                    $text3 = "Número de Identificación";

                }

			}

		}

		else

		{			
			echo "1" . $email;
			//header("location: ../");

			exit;

		}

	}

	else

	{		
		echo "2";
		//header("location: ../");

		exit;

	}

}

else

{	
	echo "3";
	//header("location: ../");

	exit;

}









// Include the main TCPDF library (search for installation path).

require_once('../plugins/tcpdf/tcpdf.php');



// create new PDF document

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set document information

$pdf->SetCreator(PDF_CREATOR);

$pdf->SetAuthor('Nicola Asuni');



$pdf->SetSubject('TCPDF Tutorial');

$pdf->SetKeywords('TCPDF, PDF, example, test, guide');



// set header and footer fonts

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));



// set default monospaced font

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);



// set margins

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);



// set auto page breaks

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);



// set image scale factor

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// set some language-dependent strings (optional)

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {

	require_once(dirname(__FILE__).'/lang/eng.php');

	$pdf->setLanguageArray($l);

}



// ---------------------------------------------------------



// set font

$pdf->SetFont('dejavusans', '', 10);



// add a page

$pdf->AddPage();



// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')

// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)



// create some HTML content

$html = '

<br/><br/>

<table>

	<tr>

		<td width="205">

			<img src="../custom/img/logos/logo.png" width="150">

		</td>

		<td width="240" align="center" valign="middle">

			<font size="9"><strong>'. $text_header .'</strong></font>

		</td>

		<td align="center" valign="middle">

		<small>Contrato web #</small><br/><strong><u>'. $id_contract .'</u></strong><br/><small><font size="5">NUMERO DE CONTRATO PARA USO EXCLUSIVO DE NIKKEN</small></font>

		</td>

	</tr>

</table>

<br/><br/>

<span><strong><font size="7">INFORMACIÓN DEL TITULAR:</font></strong></span>

<br/><br/>

<table cellspacing="5">

	<tr valign=bottom>

		<td colspan="2" style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $name .'</font></td>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $create_at .'</font></td>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $code .'</font></td>

	</tr>

	<tr>

		<td colspan="2"><font size="6">'. $text1 .'</font></td>

		<td><font size="6">Fecha de inscripción</font></td>

		<td><font size="6">Número de '. $text0 .'</font></td>

	</tr>

	<tr valign=bottom>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $country_letter .'</font></td>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $email .'</font></td>

		<td colspan="2" style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $birthday .'</font></td>

	</tr>

	<tr>

		<td><font size="6">País de residencia</font></td>

		<td><font size="6">Correo electrónico</font></td>

		<td colspan="2"><font size="6">'. $text2 .'</font></td>

	</tr>';



	if($country == 2)

	{

		if($type_incorporate == 1)

		{

			$html = $html . '<tr valign=bottom>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $type_document_name .'</font></td>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $number_document .'</font></td>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $rfc .'</font></td>

				<td></td>

			</tr>

			<tr>

				<td><font size="6">Tipo de documento</font></td>

				<td><font size="6">Número de documento</font></td>

				<td><font size="6">Registro Federal de Contribuyentes (RFC)</font></td>

			</tr>';

		}

		else

		{

			$html = $html . '<tr valign=bottom>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $type_document_name .'</font></td>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $number_document .'</font></td>

				<td></td>

				<td></td>

			</tr>

			<tr>

				<td><font size="6">Tipo de documento</font></td>

				<td><font size="6">'. $text3 .'</font></td>

				<td><font size="6"></font></td>

				<td><font size="6"></font></td>

			</tr>';

		}

	}

	else

	{

		$html = $html . '<tr valign=bottom>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $type_document_name .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $number_document .'</font></td>

			<td></td>

			<td></td>

		</tr>

		<tr>

			<td><font size="6">Tipo de documento</font></td>

			<td><font size="6">'. $text3 .'</font></td>

			<td><font size="6"></font></td>

			<td><font size="6"></font></td>

		</tr>';

	}



$html = $html . '</table><br/><br/>

<span><strong><font size="7">INFORMACIÓN DE RESIDENCIA:</font></strong></span>

<br/><br/>

<table cellspacing="5">

	<tr valign=bottom>

		<td colspan="3" style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $address .'</font></td>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $cellular .'</font></td>

	</tr>

	<tr>

		<td colspan="3"><font size="6">Dirección de residencia</font></td>

		<td><font size="6">Celular</font></td>

	</tr>';



	if($country == 2)

	{

		$html = $html . '<tr valign=bottom>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_one .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_two_name .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_three .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_four .'</font></td>

		</tr>

		<tr>

			<td><font size="6">'. $text4 .'</font></td>

			<td><font size="6">'. $text5 .'</font></td>

			<td><font size="6">'. $text6 .'</font></td>

			<td><font size="6">'. $text7 .'</font></td>

		</tr>';

	}

	elseif($country == 6)

	{

		$html = $html . '<tr valign=bottom>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_two_name .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_three .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_four .'</font></td>

			<td></td>

		</tr>

		<tr>

			<td><font size="6">'. $text5 .'</font></td>

			<td><font size="6">'. $text6 .'</font></td>

			<td><font size="6">'. $text7 .'</font></td>

			<td></td>

		</tr>';

	}

	else

	{

		$html = $html . '<tr valign=bottom>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_two_name .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $residency_three .'</font></td>

			<td></td>

			<td></td>

		</tr>

		<tr>

			<td><font size="6">'. $text5 .'</font></td>

			<td><font size="6">'. $text6 .'</font></td>

			<td></td>

			<td></td>

		</tr>';

	}

	

$html = $html . '</table>';



if($bank != 0)

{

	$html = $html . '<br/><br/><span><strong><font size="7">INFORMACIÓN BANCARIA:</font></strong></span><br/><br/>';



	if($country == 1 || $country == 4 || $country == 5 || $country == 6 || $country == 7)

	{

		$html = $html . '<table cellspacing="5">

			<tr valign=bottom>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $bank_name .'</font></td>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $bank_type_name .'</font></td>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $number_account .'</font></td>

				<td></td>

			</tr>

			<tr>

				<td><font size="6">Nombre del banco</font></td>

				<td><font size="6">Tipo de cuenta</font></td>

				<td><font size="6">'. $text8 .'</font></td>

				<td></td>

			</tr>

		</table>';

	}

	else

	{

		$html = $html . '<table cellspacing="5">

			<tr valign=bottom>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $bank_name .'</font></td>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $bank_type_name .'</font></td>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $number_account .'</font></td>

				<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $number_clabe .'</font></td>

			</tr>

			<tr>

				<td><font size="6">Nombre del banco</font></td>

				<td><font size="6">Tipo de cuenta</font></td>

				<td><font size="6">'. $text8 .'</font></td>

				<td><font size="6">'. $text9 .'</font></td>

			</tr>

		</table>';

	}

}



if($name_cotitular != "")

{

	$html = $html . '<br/><br/>

	<span><strong><font size="7">INFORMACIÓN DEL COTITULAR:</font></strong></span>

	<br/><br/>

	<table cellspacing="5">

		<tr valign=bottom>

			<td colspan="2" style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $name_cotitular .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $type_document_cotitular_name .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $number_document_cotitular .'</font></td>

		</tr>

		<tr>

			<td colspan="2"><font size="6">Apellidos y nombres</font></td>

			<td><font size="6">Tipo de documento.</font></td>

			<td><font size="6">Número de documento</font></td>

		</tr>

	</table>';

}



$html = $html . '<br/><br/>

<span><strong><font size="7">INFORMACIÓN DEL PATROCINADOR/AUSPICIADOR:</font></strong></span>

<br/><br/>

<table cellspacing="5">

	<tr valign=bottom>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $name_sponsor .'</font></td>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $sponsor .'</font></td>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $email_sponsor .'</font></td>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $cellular_sponsor .'</font></td>

	</tr>

	<tr>

		<td><font size="6">Nombre del patrocinador/auspiciador</font></td>

		<td><font size="6">Código de asesor</font></td>

		<td><font size="6">Correo electrónico</font></td>

		<td><font size="6">Teléfono</font></td>

	</tr>

</table>';



$html = $html . '<br/><br/>

<span><strong><font size="7">INFORMACIÓN DEL PAGO:</font></strong></span>

<br/><br/>';



if($payment == 0)

{

	$html = $html . '<table cellspacing="5">

		<tr valign=bottom>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">NIKKEN '. $country_letter .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">-</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7"><strong>SIN PAGO</strong></font></td>

			<td></td>

		</tr>

		<tr>

			<td><font size="6">Método de pago</font></td>

			<td><font size="6">Referencia</font></td>

			<td><font size="6">Estatus</font></td>

			<td></td>

		</tr>

	</table>';

}

else

{

	$html = $html . '<table cellspacing="5">

		<tr valign=bottom>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">NIKKEN '. $country_letter .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">WEB-'. $country_abrev .'-'. $payment .'</font></td>

			<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">Pagada</font></td>

			<td></td>

		</tr>

		<tr>

			<td><font size="6">Método de pago</font></td>

			<td><font size="6">Referencia</font></td>

			<td><font size="6">Estatus</font></td>

			<td></td>

		</tr>

	</table>';

}



$html = $html . '<br/><br/>

<span><strong><font size="7">INFORMACIÓN ADICIONAL:</font></strong></span>

<br/><br/>

<table cellspacing="5">

	<tr valign=bottom>

		<td style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $ip .'</font></td>

		<td colspan="3" style="border-bottom: 1px solid #DEDEDE; vertical-align: bottom;" valign=bottom><font size="7">'. $browser .'</font></td>

	</tr>

	<tr>

		<td><font size="6">IP donde se genero la solicitud</font></td>

		<td colspan="3"><font size="6">Navegador</font></td>

	</tr>

</table>';



$queryResult = $pdo->prepare("SELECT content FROM terms where country = :country and type = :type");

$queryResult->execute(array(':country' => $country, ':type' => $type));

$done = $queryResult->fetch();

if($done)

{

	$html = $html . '<br/><br/>

	<span><strong><font size="7">TÉRMINOS Y CONDICIONES:</font></strong></span>

	<font size="7"><span style="text-align:justify;">'.$done['content'].'</span></font>';

}





// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



// reset pointer to the last page

$pdf->lastPage();



// ---------------------------------------------------------



//Close and output PDF document

$pdf->Output('example_006.pdf', 'I');



//============================================================+

// END OF FILE

//============================================================+

