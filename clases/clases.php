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

    public function asignar_glucosa($glucosa, $glucosa_tipo) {
        $this->glucosa = $glucosa;
        $this->glucosa_tipo = $glucosa_tipo;
    }

    public function asignar_presion($sistolica, $diastolica) {
        $this->sistolica = $sistolica;
        $this->diastolica = $diastolica;
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
              <p class="text_resultado"> Su peso está en la categoría de Bajo peso para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variaría entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Recomendamos consultar con su médico para saber las posibles causas del bajo peso y si necesita ganar peso.
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
              <p class="text_resultado"> Su peso está en la categoría Normal para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variaría entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
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
              <p class="text_resultado"> Su peso está en la categoría de Sobrepeso para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variaría entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Las personas que tienen sobrepeso o son obesas tienen un mayor riesgo de afecciones crónicas, tales como hipertensión arterial, diabetes y colesterol alto. Recomendamos consultar a su médico.
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
              <p class="text_resultado"> Su peso está en la categoría de Obeso para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variaría entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Las personas que tienen sobrepeso o son obesas tienen un mayor riesgo de afecciones crónicas, tales como hipertensión arterial, diabetes y colesterol alto. Recomendamos consultar a su médico.
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
              <p class="text_resultado"> Su peso está en la categoría de Extrema obesidad para adultos de su misma estatura.</br></br>
              Para su estatura de <?php echo round($altura,2);?> m, un peso normal variaría entre <?php echo round($masanormal_bajo,1);?> kg y <?php echo round($masanormal_alto,1);?> kg. </br></br>
              Recomendamos consultar con su médico. La extrema obesidad podría tener consecuencias fatales para la salud.
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
                    <p class="text_resultado"> Su lectura de glucosa en la sangre está debajo de lo normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, debería de tener un resultado entre 70 y 100 mg/dL. </br></br>
                    Recomendamos consultar con su médico para saber las posibles causas del bajo resultado.
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
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, debería de tener un resultado entre 70 y 100 mg/dL. </br></br>
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
                    <p class="text_resultado"> Su lectura de glucosa en la sangre está por encima de lo normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, debería de tener un resultado entre 70 y 100 mg/dL. </br></br>
                    Presenta síntomas de Pre Diabetes. Recomendamos consultar con su médico para saber las posibles razones de su alto resultado.
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
                    <p class="text_resultado"> Su lectura de glucosa en la sangre está bastante por encima de lo normal.</br></br>
                    Para alguien que haya hecho su lectura "<?php echo $glucosa_tipo;?>", debería de tener un resultado entre 70 y 100 mg/dL. </br></br>
                    Presenta síntomas de Diabetes. Recomendamos consultar con su médico para saber las posibles razones de su alto resultado.
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
                    <p class="text_resultado"> Su lectura de glucosa en la sangre está debajo de lo normal.</br></br>
                    Para alguien que haya hecho su lectura "<?php echo $glucosa_tipo;?>", debería de tener un resultado entre 70 y 100 mg/dL. </br></br>
                    Recomendamos consultar con su médico para saber las posibles causas del bajo resultado.
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
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, debería de tener un resultado entre 70 y 140 mg/dL. </br></br>
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
                    <p class="text_resultado"> Su lectura de glucosa en la sangre está por encima de lo normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, debería de tener un resultado entre 70 y 140 mg/dL. </br></br>
                    Presenta síntomas de Pre Diabetes. Recomendamos consultar con su médico para saber las posibles razones de su alto resultado.
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
                    <p class="text_resultado"> Su lectura de glucosa en la sangre está bastante por encima de lo normal.</br></br>
                    Para alguien que haya hecho su lectura <?php echo $glucosa_tipo;?>, debería de tener un resultado entre 70 y 140 mg/dL. </br></br>
                    Presenta síntomas de Diabetes. Recomendamos consultar con su médico para saber las posibles razones de su alto resultado.
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
                    $mensaje_presion='Presión Arterial Baja';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presión arterial está por debajo de lo normal.</br></br>
              La presión arterial normal es mayor o igual a 90 y menor a 120 mm Hg para la Sistólica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diastólica. </br></br>
              Recomendamos consultar con su médico para saber las posibles causas se su baja presión arterial.
                </p>
            <?php
            
        }
        elseif (($sistolica>=90)&&($sistolica<120)&&($diastolica<80)){
            ?>
              <button class = "resultadoverde" type="button">   
                <?php 
                    $mensaje_presion='Presión Arterial Normal';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presión arterial está dentro de lo normal.</br></br>
              La presión arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sistólica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diastólica. </br></br>
              Recomendamos mantener un estilo de vida saludable.
                </p>
            <?php
            
        }
        elseif (($sistolica>=120)&&($sistolica<130)&&($diastolica<80)){
            ?>
              <button class = "resultadoamarillo" type="button">   
                <?php 
                    $mensaje_presion='Presión Arterial Elevada';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presión arterial está más elevada de lo normal.</br></br>
              La presión arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sistólica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diastólica. </br></br>
              Recomendamos consultar con su médico para saber las posibles causas de la presión arterial elevada.
                </p>
            <?php
            
        }
        elseif ((($sistolica>=130)&&($sistolica<139))||($diastolica>=80)&&($diastolica<90)){
            ?>
              <button class = "resultadonaranja" type="button">   
                <?php 
                    $mensaje_presion='Presión Arterial Alta </br>Hipertensión Nivel 1';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presión arterial está más alta de lo normal.</br></br>
              La presión arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sistólica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diastólica. </br></br>
              Presenta síntomas de Hipertensión Nivel 1. Recomendamos consultar con su médico para saber las posibles causas de la presión arterial alta.
                </p>
            <?php
            
        }
        elseif ((($sistolica>=140)&&($sistolica<180))||($diastolica>=90)&&($diastolica<120)){
            ?>
              <button class = "resultadonaranja" type="button">   
                <?php 
                    $mensaje_presion='Presión Arterial Alta </br>Hipertensión Nivel 2';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presión arterial está más alta de lo normal.</br></br>
              La presión arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sistólica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diastólica. </br></br>
              Presenta síntomas de Hipertensión Nivel 2. Recomendamos consultar con su médico para saber las posibles causas de la presión arterial alta.
                </p>
            <?php
            
        }
        elseif (($sistolica>=180)||($diastolica>=120)){
            ?>
              <button class = "resultadorojo" type="button">   
                <?php 
                    $mensaje_presion='CRISIS DE HIPERTENSIÓN </br>Consulte a su médico inmediatemente';
                    echo $mensaje_presion; 
                ?>
              </button> </br>
              <p class="text_resultado"> Su presión arterial está demasiado alta.</br></br>
              La presión arterial normal es mayor o igual a 90 y  menor a 120 mm Hg para la Sistólica, y es mayor o igual a 60 y menor a 80 mm Hg para la Diastólica. </br></br>
              Presenta síntomas de CRISIS DE HIPERTENSIÓN. Recomendamos consultar con su médico de inmediato.
                </p>
            <?php
            
        }
        
    }


}
