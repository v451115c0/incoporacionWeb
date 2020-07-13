<?php 
    @session_name("incorporacion");
    @session_start();

    if(isset($_SESSION["type_incorporate_nc"])){
        $type_incorporate_nc = $_SESSION["type_incorporate_nc"];
    }

    require_once('../../conexion.php');

    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $kit = $_POST['kit'];
    $kit_influencer = false;

    if(!empty($kit) && $kit != 5006 && !empty($gender) && !empty($country)){
        $kit_influencer = true;
    }

    if($gender == 'M'){
        $gender = "Hombre";
    }
    else{
        $gender = "Mujer";
    }

    $options = "";
    $queryResult = $pdo->prepare("SELECT * FROM cat_shirts WHERE pais = 'PER' AND genero = '$gender';");
    $queryResult->execute(array(':country' => $country));
    while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
        $options = $options . "<option value='" . $row['item'] . "'>" . $row['descripcion'] . "</option>";
    }
?>

<?php if($kit_influencer){ ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="styled-select">
                <select class="required" name="shirt-size" id="shirt-size" onchange="showShirtSample()">
                    <option value="">Talla de tu camiseta</option>
                    <?php echo $options ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" id="shirt-sample">
            <img src='img/shirts/simple.png' width='100%' name='shirt-sample'>
        </div>
        <div class="form-group">
            <input type="text" id="tallaLetra" class="required" readonly name="tallaLetra" hidden>
        </div>
    </div>
</div>
<script>
    function showShirtSample(){
        var item = document.getElementById('shirt-size').value;
        var divSample = document.getElementById('shirt-sample');
        var inputProtect = document.getElementById('tallaLetra');
        var imgSample = "";
        var tallaLetra = "";

        if(item == ""){
            item = "simple";
        }

        if(item == 9707){
            tallaLetra = "S-Hombre";
        }
        if(item == 9708){
            tallaLetra = "M-Hombre";
        }
        if(item == 9709){
            tallaLetra = "L-Hombre";
        }
        if(item == 9710){
            tallaLetra = "XL-Hombre";
        }

        if(item == 9711){
            tallaLetra = "S-Mujer";
        }
        if(item == 9712){
            tallaLetra = "M-Mujer";
        }
        if(item == 9713){
            tallaLetra = "L-Mujer";
        }
        if(item == 9714){
            tallaLetra = "XL-Mujer";
        }

        divSample.innerHTML = "<img src='img/shirts/" + item + ".png' width='100%' name='shirt-sample'>";
        inputProtect.value = tallaLetra;
    }
</script>
<?php } ?>