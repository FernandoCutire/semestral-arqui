<?php


class calculos{

    private $altura = 0;
    private $masa = 1;
    private $glucosa = 0;
    private $glucosa_tipo = "";
    private $sistolica =0;
    private $diastolica=0;

    
    public function asignar_imc($altura, $masa) {
        $this->altura = $altura;
        $this->masa = $masa;
       
    }

    
    public function bd_imc($altura, $masa) {

        $res = round($masa/($altura*$altura),1);


        if ($res<18.5){
            
            return $res . " (Bajo de Peso)";
        }
        elseif ($res>=18.5 && $res<25){
            
            return $res . " (Peso Normal)";
        }
        elseif ($res>=25 && $res<30){
            
            return $res . " (Sobrepeso)";
        }
        elseif ($res>=30 && $res<40){
           
            return $res . " (Obeso)";
        }
        elseif ($res>=40){

            return $res . " (Extrema Obesidad)";
    }
    }

    public function asignar_glucosa($glucosa, $glucosa_tipo) {
        $this->glucosa = $glucosa;
        $this->glucosa_tipo = $glucosa_tipo;
    }

    public function bd_glucosa($glucosa, $glucosa_tipo) {
        switch ($glucosa_tipo) {
        case "en ayuna":
            if ($glucosa<70){
                
                
            }
            elseif($glucosa>=70 && $glucosa<=100) {
                
                        $res_glucosa='Glucosa Normal';
                        return $res_glucosa;       
                   
            }
            elseif($glucosa>100 && $glucosa<126) {
                
                
                        $res_glucosa='Pre Diabetes';
                        return $res_glucosa;
                    
            }
            elseif($glucosa>=126) {
                
                        $res_glucosa='Diabetes';
                        return $res_glucosa;
                       
                   
            }
            
            break;
        case "Posprandial":
            if ($glucosa<70){
                $res_glucosa='Glucosa Baja';
                return $res_glucosa;
                        
                
            }
            elseif($glucosa>=70 && $glucosa<=140) {
                $res_glucosa='Glucosa Normal';
                return $res_glucosa;
                        
            }
            elseif($glucosa>140 && $glucosa<200) {
                $res_glucosa='Pre Diabetes';
                return $res_glucosa;
                       
            }
            elseif($glucosa>=200) {
                $res_glucosa='Diabetes';
                return $res_glucosa;
                        
            }
            break;
        }
        
    }

    public function asignar_presion($sistolica, $diastolica) {
        $this->sistolica = $sistolica;
        $this->diastolica = $diastolica;
    }

    public function db_presion($sistolica, $diastolica) {
        if (($sistolica<90)&&($diastolica<60)){
            $res_presion='Presi??n Arterial Baja';
             return $res_presion;      
        }
        elseif (($sistolica>=90)&&($sistolica<120)&&($diastolica<80)){
            $res_presion='Presi??n Arterial Normal';
            return $res_presion;         
        }
        elseif (($sistolica>=120)&&($sistolica<130)&&($diastolica<80)){
            $res_presion='Presi??n Arterial Elevada';
            return $res_presion;         
            
        }
        elseif ((($sistolica>=130)&&($sistolica<139))||($diastolica>=80)&&($diastolica<90)){
            $res_presion='Hipertensi??n Nivel 1';
            return $res_presion;     
            
        }
        elseif ((($sistolica>=140)&&($sistolica<180))||($diastolica>=90)&&($diastolica<120)){
            $res_presion='Hipertensi??n Nivel 2';
            return $res_presion;         
            
        }
        elseif (($sistolica>=180)||($diastolica>=120)){
            $res_presion='CRISIS DE HIPERTENSI??N </br>Consulte a su m??dico inmediatemente';
            return $res_presion;         
            
        }
    }



    public function Calcularimc($altura, $masa) {
        $resultado_imc =0;
        $resultado_imc = $masa/($altura*$altura);
        $masanormal_bajo = 18.5 * ($altura*$altura);
        $masanormal_alto = 24.9 * ($altura*$altura);

       
        if ($resultado_imc<18.5){
            ?>
              <button class = "resultadoazul" type="button">   
                <?php 
                    $mensaje_imc='IMC: ' . round($resultado_imc,1) . '</br> Bajo de peso';
                    echo $mensaje_imc; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su peso est?? en la categor??a de Bajo peso para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variar??a entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Recomendamos consultar con su m??dico para saber las posibles causas del bajo peso y si necesita ganar peso.
                </p>
            <?php
            
        }
        elseif ($resultado_imc>=18.5 && $resultado_imc<25){
            ?>
              <button class = "resultadoverde" type="button">  
              <?php 
                    $mensaje_imc='IMC: ' . round($resultado_imc,1) . '</br> Peso Normal';
                    echo $mensaje_imc; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su peso est?? en la categor??a Normal para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variar??a entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Tenga una dieta saludable y vida activa para mantener su peso.
                </p>
            <?php
            
        }
        elseif ($resultado_imc>=25 && $resultado_imc<30){
            ?>
              <button class = "resultadoamarillo" type="button">   
              <?php 
                    $mensaje_imc='IMC: ' . round($resultado_imc,1) . '</br> Sobrepeso';
                    echo $mensaje_imc; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su peso est?? en la categor??a de Sobrepeso para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variar??a entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Las personas que tienen sobrepeso o son obesas tienen un mayor riesgo de afecciones cr??nicas, tales como hipertensi??n arterial, diabetes y colesterol alto. Recomendamos consultar a su m??dico.
                </p>
            <?php
            
        }
        elseif ($resultado_imc>=30 && $resultado_imc<40){
            ?>
              <button class = "resultadonaranja" type="button">   
              <?php 
                    $mensaje_imc='IMC: ' . round($resultado_imc,1) . '</br> Obeso';
                    echo $mensaje_imc; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su peso est?? en la categor??a de Obeso para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variar??a entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Las personas que tienen sobrepeso o son obesas tienen un mayor riesgo de afecciones cr??nicas, tales como hipertensi??n arterial, diabetes y colesterol alto. Recomendamos consultar a su m??dico.
                </p>
            <?php
            
        }
        elseif ($resultado_imc>=40){
            ?>
              <button class = "resultadorojo" type="button">   
              <?php 
                    $mensaje_imc='IMC: ' . round($resultado_imc,1) . '</br> Extrema Obesidad';
                    echo $mensaje_imc; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su peso est?? en la categor??a de Extrema obesidad para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variar??a entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Recomendamos consultar con su m??dico. La extrema obesidad podr??a tener consecuencias fatales para la salud.
                </p>
            <?php
            
        }
    }


    public function Calcularglucosa($glucosa, $glucosa_tipo) {
       


        switch ($glucosa_tipo) {
            case "en ayuna":
                if ($glucosa<70){
                    ?>
                    <button class = "resultadoazul" type="button">   
                        <?php 
                            $mensaje_imc='Glucosa Baja';
                            echo $mensaje_imc; 
                        ?>
                    </button> </br>
                    <p class="text_resultado"> Su lectura de glucosa en la sangre est?? debajo de lo normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, deber??a de tener un resultado entre 70 y 100 mg/dL. </br></br>
                    Recomendamos consultar con su m??dico para saber las posibles causas del bajo resultado.
                        </p>
                    <?php
                    
                }
                elseif($glucosa>=70 && $glucosa<=100) {
                    ?>
                    <button class = "resultadoverde" type="button">   
                        <?php 
                            $mensaje_imc='Glucosa Normal';
                            echo $mensaje_imc; 
                        ?>
                    </button> </br>
                    <p class="text_resultado"> Su lectura de glucosa en la sangre es normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, deber??a de tener un resultado entre 70 y 100 mg/dL. </br></br>
                        </p>
                    <?php
                }
                elseif($glucosa>100 && $glucosa<126) {
                    ?>
                    <button class = "resultadoamarillo" type="button">   
                        <?php 
                            $mensaje_imc='Pre Diabetes';
                            echo $mensaje_imc; 
                        ?>
                    </button> </br>
                    <p class="text_resultado"> Su lectura de glucosa en la sangre est?? por encima de lo normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, deber??a de tener un resultado entre 70 y 100 mg/dL. </br></br>
                    Presenta s??ntomas de Pre Diabetes. Recomendamos consultar con su m??dico para saber las posibles razones de su alto resultado.
                        </p>
                    <?php
                }
                elseif($glucosa>=126) {
                    ?>
                    <button class = "resultadorojo" type="button">   
                        <?php 
                            $mensaje_imc='Diabetes';
                            echo $mensaje_imc; 
                        ?>
                    </button> </br>
                    <p class="text_resultado"> Su lectura de glucosa en la sangre est?? bastante por encima de lo normal.</br></br>
                    Para alguien que haya hecho su lectura "<?php echo $glucosa_tipo;?>", deber??a de tener un resultado entre 70 y 100 mg/dL. </br></br>
                    Presenta s??ntomas de Diabetes. Recomendamos consultar con su m??dico para saber las posibles razones de su alto resultado.
                        </p>
                    <?php
                }
                
                break;
            case "Posprandial":
                if ($glucosa<70){
                    ?>
                    <button class = "resultadoazul" type="button">   
                        <?php 
                            $mensaje_imc='Glucosa Baja';
                            echo $mensaje_imc; 
                        ?>
                    </button> </br>
                    <p class="text_resultado"> Su lectura de glucosa en la sangre est?? debajo de lo normal.</br></br>
                    Para alguien que haya hecho su lectura "<?php echo $glucosa_tipo;?>", deber??a de tener un resultado entre 70 y 100 mg/dL. </br></br>
                    Recomendamos consultar con su m??dico para saber las posibles causas del bajo resultado.
                        </p>
                    <?php
                    
                }
                elseif($glucosa>=70 && $glucosa<=140) {
                    ?>
                    <button class = "resultadoverde" type="button">   
                        <?php 
                            $mensaje_imc='Glucosa Normal';
                            echo $mensaje_imc; 
                        ?>
                    </button> </br>
                    <p class="text_resultado"> Su lectura de glucosa en la sangre es normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, deber??a de tener un resultado entre 70 y 140 mg/dL. </br></br>
                        </p>
                    <?php
                }
                elseif($glucosa>140 && $glucosa<200) {
                    ?>
                    <button class = "resultadoamarillo" type="button">   
                        <?php 
                            $mensaje_imc='Pre Diabetes';
                            echo $mensaje_imc; 
                        ?>
                    </button> </br>
                    <p class="text_resultado"> Su lectura de glucosa en la sangre est?? por encima de lo normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, deber??a de tener un resultado entre 70 y 140 mg/dL. </br></br>
                    Presenta s??ntomas de Pre Diabetes. Recomendamos consultar con su m??dico para saber las posibles razones de su alto resultado.
                        </p>
                    <?php
                }
                elseif($glucosa>=200) {
                    ?>
                    <button class = "resultadorojo" type="button">   
                        <?php 
                            $mensaje_imc='Diabetes';
                            echo $mensaje_imc; 
                        ?>
                    </button> </br>
                    <p class="text_resultado"> Su lectura de glucosa en la sangre est?? bastante por encima de lo normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, deber??a de tener un resultado entre 70 y 140 mg/dL. </br></br>
                    Presenta s??ntomas de Diabetes. Recomendamos consultar con su m??dico para saber las posibles razones de su alto resultado.
                        </p>
                    <?php
                }
                break;
        }



    }

    public function Calcularpresion($sistolica, $diastolica) {

       

        if (($sistolica<90)&&($diastolica<60)){
            ?>
              <button class = "resultadoazul" type="button">   
                <?php 
                    $mensaje_presion='Presi??n Arterial Baja';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presi??n arterial est?? por debajo de lo normal.</br></br>
              La presi??n arterial normal es mayor o igual a 90 y menor a 120 mm Hg para la Sist??lica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diast??lica. </br></br>
              Recomendamos consultar con su m??dico para saber las posibles causas se su baja presi??n arterial.
                </p>
            <?php
            
        }
        elseif (($sistolica>=90)&&($sistolica<120)&&($diastolica<80)){
            ?>
              <button class = "resultadoverde" type="button">   
                <?php 
                    $mensaje_presion='Presi??n Arterial Normal';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presi??n arterial est?? dentro de lo normal.</br></br>
              La presi??n arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sist??lica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diast??lica. </br></br>
              Recomendamos mantener un estilo de vida saludable.
                </p>
            <?php
            
        }
        elseif (($sistolica>=120)&&($sistolica<130)&&($diastolica<80)){
            ?>
              <button class = "resultadoamarillo" type="button">   
                <?php 
                    $mensaje_presion='Presi??n Arterial Elevada';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presi??n arterial est?? m??s elevada de lo normal.</br></br>
              La presi??n arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sist??lica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diast??lica. </br></br>
              Recomendamos consultar con su m??dico para saber las posibles causas de la presi??n arterial elevada.
                </p>
            <?php
            
        }
        elseif ((($sistolica>=130)&&($sistolica<139))||($diastolica>=80)&&($diastolica<90)){
            ?>
              <button class = "resultadonaranja" type="button">   
                <?php 
                    $mensaje_presion='Presi??n Arterial Alta </br>Hipertensi??n Nivel 1';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presi??n arterial est?? m??s alta de lo normal.</br></br>
              La presi??n arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sist??lica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diast??lica. </br></br>
              Presenta s??ntomas de Hipertensi??n Nivel 1. Recomendamos consultar con su m??dico para saber las posibles causas de la presi??n arterial alta.
                </p>
            <?php
            
        }
        elseif ((($sistolica>=140)&&($sistolica<180))||($diastolica>=90)&&($diastolica<120)){
            ?>
              <button class = "resultadonaranja" type="button">   
                <?php 
                    $mensaje_presion='Presi??n Arterial Alta </br>Hipertensi??n Nivel 2';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presi??n arterial est?? m??s alta de lo normal.</br></br>
              La presi??n arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sist??lica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diast??lica. </br></br>
              Presenta s??ntomas de Hipertensi??n Nivel 2. Recomendamos consultar con su m??dico para saber las posibles causas de la presi??n arterial alta.
                </p>
            <?php
            
        }
        elseif (($sistolica>=180)||($diastolica>=120)){
            ?>
              <button class = "resultadorojo" type="button">   
                <?php 
                    $mensaje_presion='CRISIS DE HIPERTENSI??N </br>Consulte a su m??dico inmediatemente';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presi??n arterial est?? demasiado alta.</br></br>
              La presi??n arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sist??lica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diast??lica. </br></br>
              Presenta s??ntomas de CRISIS DE HIPERTENSI??N. Recomendamos consultar con su m??dico de inmediato.
                </p>
            <?php
            
        }
        
    }


}
