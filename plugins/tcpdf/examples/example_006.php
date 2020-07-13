<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+



// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

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
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
<table>
	<tr>
		<td width="55">
			<img src="../../assets/img/logonikken.png" width="50">
		</td>
		<td width="150" valign="middle">
			<font size="6"><strong>Nikken Perú</strong><br/>
			<strong>RUC:</strong> 20548547068<br/>
			<strong>Dirección:</strong> Avenida Manuel Olguín 215-217, oficina 1402, Santiago de Surco, Lima, Lima 33, Perú</font>
		</td>
		<td width="240" align="center" valign="middle">
			<strong>Solicitud de Inscripción y Acuerdo Comerciante Independiente</strong>
		</td>
		<td align="right" valign="middle">
		<strong>WEB - 25545</strong>
		</td>
	</tr>
</table>
<br/><br/>
<span><strong><font size="7">INFORMACIÓN GENERAL DEL TITULAR:</font></strong></span>
<br/><br/>
<table cellspacing="10">
	<tr valign=bottom>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">CALLEJAS CHARRY, CAMILO</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">Cédula de Ciudadania</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">1.030.597.342</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">Simplifricado</font></td>
	</tr>
	<tr>
		<td><font size="6">Nombres (primer apellido, segundo apellido y nombres completos).</font></td>
		<td><font size="6">Tipo de Documento.</font></td>
		<td><font size="6">Documento de Identidad.</font></td>
		<td><font size="6">Tipo de Régimen.</font></td>
	</tr>
	<tr valign=bottom>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">Cra 81 B N° 8 D 14</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">Bogotá</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">Cundinamarca</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">057</font></td>
	</tr>
	<tr>
		<td><font size="6">Dirección (Calle, Avenida, Carrera ó Kilometro / N° Interior, Apartamento, Casa ó Lote).</font></td>
		<td><font size="6">Ciudad.</font></td>
		<td><font size="6">Departamento.</font></td>
		<td><font size="6">Código Postal ó Apartado aéreo - Zona.</font></td>
	</tr>
	<tr valign=bottom>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">ccallejas@nikken.com.co</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">4117520</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">321-214-04-99</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">15/08/1991</font></td>
	</tr>
	<tr>
		<td><font size="6">Correo Electrónico.</font></td>
		<td><font size="6">Teléfono fijo.</font></td>
		<td><font size="6">Teléfono Celular.</font></td>
		<td><font size="6">Fecha de nacimiento del titular.</font></td>
	</tr>
	<tr valign=bottom>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">CITIBANK</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">Ahorros</font></td>
		<td colspan="2" style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">10054478585</font></td>
	</tr>
	<tr>
		<td><font size="6">Nombre del Banco.</font></td>
		<td><font size="6">Tipo de Cuenta.</font></td>
		<td colspan="2"><font size="6">Número de Cuenta.</font></td>
	</tr>
</table>
<br/><br/>
<span><strong><font size="7">INFORMACIÓN GENERAL DEL COTITULAR:</font></strong></span>
<br/><br/>
<table cellspacing="10">
	<tr valign=bottom>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">RUBIO, PAULINA ANDREA</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">1.322.666.252</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">paulinamanda@hotmail.com</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">Simplificado</font></td>
	</tr>
	<tr>
		<td><font size="6">Nombres (primer apellido, segundo apellido y nombres completos).</font></td>
		<td><font size="6">Tipo de Documento.</font></td>
		<td><font size="6">Documento de Identidad.</font></td>
		<td><font size="6">Tipo de Régimen.</font></td>
	</tr>
</table>
<br/><br/>
<span><br/><strong><font size="7">INFORMACIÓN DEL PATROCINADOR / AUSPICIADOR:</font></strong></span>
<br/><br/>
<table cellspacing="10">
	<tr valign=bottom>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">OLINDA CLAVIJO CLAVIJO</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">2328003</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">oclavijocll@yahoo.com</font></td>
		<td style="border-bottom: 1px solid black; vertical-align: bottom;" valign=bottom><font size="7">654-5857-85225</font></td>
	</tr>
	<tr>
		<td><font size="6">Nombre del Asesor de Bienestar.</font></td>
		<td><font size="6">Código del Asesor.</font></td>
		<td><font size="6">Correo Electrónico.</font></td>
		<td><font size="6">Teléfono principal.</font></td>
	</tr>
</table>
<br/><br/>
<span><strong><font size="7">PAQUETES PARA INICIAR TU NEGOCIO:</font></strong></span>
<span><h4>Adquirido el 5001 Kit de Inicio.</h4></span>
<span><br/><br/><strong><font size="7">FORMA DE PAGO:</font></strong></span>
<span><h4>Adquirido por la Tienda Virtual - Referencia WEB-25545.</h4></span>
<span><br/><br/><strong><font size="7">TERMINOS Y CONDICIONES:</font></strong></span>
<br/><br/>
<span><font size="6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto temporibus, nobis rem hic iusto iure dignissimos delectus ab, ratione molestiae eaque asperiores doloremque dolore debitis minus, et iste error voluptate. Asperiores rem doloribus vitae voluptatibus maiores, veniam eveniet aliquid quas qui quo fuga quaerat nam modi, quisquam ea voluptatum. Ipsa iure hic ullam, ea eos quod mollitia libero nihil ducimus voluptatum excepturi? In similique at magni accusamus, voluptate possimus corporis nemo laudantium labore architecto! Minima nobis, quaerat amet consectetur! Ad laborum ullam blanditiis, commodi sit suscipit alias dolorum fugit doloremque, impedit praesentium quo debitis error vel similique, dolores sed consequuntur porro saepe, veritatis mollitia! Natus quam aliquam magnam nam dolor aut praesentium mollitia veritatis ipsa, corrupti consequuntur fugit similique obcaecati suscipit saepe unde iste cum alias, aspernatur at. Natus tempore eius quia, aspernatur est laborum corporis animi ipsa repudiandae, eos, illo quo? Ratione ad veniam et ab blanditiis praesentium quisquam, laboriosam incidunt autem recusandae! Corrupti, sint quam aliquid pariatur unde nesciunt ab sequi iure natus accusamus porro necessitatibus velit a debitis labore, rem quae temporibus minus odio saepe suscipit impedit. Quae dicta qui eaque ipsum recusandae commodi debitis accusamus dolor similique obcaecati ut numquam nam cupiditate mollitia consequatur quo perferendis a unde, facilis asperiores! Ipsa provident facere eligendi quae, distinctio, cumque molestiae ad magni quidem fugit non animi. Eum, sunt, eveniet. Fugit incidunt autem esse voluptates minus aliquam ipsam excepturi eaque iste quis saepe laborum neque necessitatibus molestias maiores pariatur id, itaque, perferendis expedita. Recusandae nostrum similique facere consectetur dolorum commodi et, saepe, quas soluta itaque doloremque hic eveniet ut quam quis. Eum ullam aspernatur iure voluptates reprehenderit magnam odit. Mollitia dicta ab quasi nostrum. Magnam odit corrupti aliquam molestias delectus, quo nam veritatis velit perspiciatis ullam nesciunt est vitae qui tempora, perferendis officia ratione dolorum dignissimos ea excepturi quos similique libero error adipisci. Veniam velit nulla impedit fugit blanditiis, consequatur voluptatum natus quidem perferendis molestias cupiditate corrupti totam ea dignissimos quaerat eos, nemo voluptates voluptatem mollitia! Sit quos excepturi quisquam quibusdam corrupti adipisci, expedita consectetur possimus vitae ab quasi, animi cumque eveniet maxime officiis quidem qui? Dolores, officia sapiente nostrum dicta eligendi? Laudantium labore, illum minus quod ratione facere dolores in nam at eum sunt, aliquid, impedit nulla veritatis soluta distinctio. Mollitia nesciunt minus quos tempora magnam praesentium tenetur iste illum. Laborum error et voluptatem at nobis soluta modi assumenda repellendus quo, accusamus magni unde delectus porro? Maiores corporis quod architecto molestias illum exercitationem rem, accusamus, quisquam tenetur necessitatibus cumque, iste minus aliquam. Maiores ut, vel at eligendi voluptate vero quae ratione hic necessitatibus impedit aliquam reiciendis esse totam dolore quidem modi perferendis, culpa aspernatur quas, voluptates deserunt ab nulla sed. Architecto harum laboriosam id quia molestias est repellendus officiis inventore aut rerum. Sed inventore cupiditate error, ipsa sunt magnam maxime. Maxime officia quibusdam sit necessitatibus impedit, amet nulla officiis assumenda eaque. Aspernatur aperiam odit eius accusamus possimus cumque cum rem aut magni quasi adipisci debitis qui corporis asperiores porro, aliquam in autem est esse! Sint consequatur rem odio!</font></span>
<br/>
<span><font size="7"><strong>Acepto que he leído, entiendo y estoy de acuerdo en los términos de la solicitud y del contrato anteriormente descrito.</strong></font></span>
<br/><br/>
<span><strong><font size="7">POLITICA DE PRIVACIDAD:</font></strong></span>
<br/><br/>
<span><font size="6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto temporibus, nobis rem hic iusto iure dignissimos delectus ab, ratione molestiae eaque asperiores doloremque dolore debitis minus, et iste error voluptate. Asperiores rem doloribus vitae voluptatibus maiores, veniam eveniet aliquid quas qui quo fuga quaerat nam modi, quisquam ea voluptatum. Ipsa iure hic ullam, ea eos quod mollitia libero nihil ducimus voluptatum excepturi? In similique at magni accusamus, voluptate possimus corporis nemo laudantium labore architecto! Minima nobis, quaerat amet consectetur! Ad laborum ullam blanditiis, commodi sit suscipit alias dolorum fugit doloremque, impedit praesentium quo debitis error vel similique, dolores sed consequuntur porro saepe, veritatis mollitia! Natus quam aliquam magnam nam dolor aut praesentium mollitia veritatis ipsa, corrupti consequuntur fugit similique obcaecati suscipit saepe unde iste cum alias, aspernatur at. Natus tempore eius quia, aspernatur est laborum corporis animi ipsa repudiandae, eos, illo quo? Ratione ad veniam et ab blanditiis praesentium quisquam, laboriosam incidunt autem recusandae! Corrupti, sint quam aliquid pariatur unde nesciunt ab sequi iure natus accusamus porro necessitatibus velit a debitis labore, rem quae temporibus minus odio saepe suscipit impedit. Quae dicta qui eaque ipsum recusandae commodi debitis accusamus dolor similique obcaecati ut numquam nam cupiditate mollitia consequatur quo perferendis a unde, facilis asperiores! Ipsa provident facere eligendi quae, distinctio, cumque molestiae ad magni quidem fugit non animi. Eum, sunt, eveniet. Fugit incidunt autem esse voluptates minus aliquam ipsam excepturi eaque iste quis saepe laborum neque necessitatibus molestias maiores pariatur id, itaque, perferendis expedita. Recusandae nostrum similique facere consectetur dolorum commodi et, saepe, quas soluta itaque doloremque hic eveniet ut quam quis. Eum ullam aspernatur iure voluptates reprehenderit magnam odit. Mollitia dicta ab quasi nostrum. Magnam odit corrupti aliquam molestias delectus, quo nam veritatis velit perspiciatis ullam nesciunt est vitae qui tempora, perferendis officia ratione dolorum dignissimos ea excepturi quos similique libero error adipisci. Veniam velit nulla impedit fugit blanditiis, consequatur voluptatum natus quidem perferendis molestias cupiditate corrupti totam ea dignissimos quaerat eos, nemo voluptates voluptatem mollitia! Sit quos excepturi quisquam quibusdam corrupti adipisci, expedita consectetur possimus vitae ab quasi, animi cumque eveniet maxime officiis quidem qui? Dolores, officia sapiente nostrum dicta eligendi? Laudantium labore, illum minus quod ratione facere dolores in nam at eum sunt, aliquid, impedit nulla veritatis soluta distinctio. Mollitia nesciunt minus quos tempora magnam praesentium tenetur iste illum. Laborum error et voluptatem at nobis soluta modi assumenda repellendus quo, accusamus magni unde delectus porro? Maiores corporis quod architecto molestias illum exercitationem rem, accusamus, quisquam tenetur necessitatibus cumque, iste minus aliquam. Maiores ut, vel at eligendi voluptate vero quae ratione hic necessitatibus impedit aliquam reiciendis esse totam dolore quidem modi perferendis, culpa aspernatur quas, voluptates deserunt ab nulla sed. Architecto harum laboriosam id quia molestias est repellendus officiis inventore aut rerum. Sed inventore cupiditate error, ipsa sunt magnam maxime. Maxime officia quibusdam sit necessitatibus impedit, amet nulla officiis assumenda eaque. Aspernatur aperiam odit eius accusamus possimus cumque cum rem aut magni quasi adipisci debitis qui corporis asperiores porro, aliquam in autem est esse! Sint consequatur rem odio!</font></span>
<br/>
<span><font size="7"><strong>Acepto que la información que ha escrito puede ser utilizada por Nikken.</strong></font></span>
';

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
