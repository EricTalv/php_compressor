 <!DOCTYPE html>
	
<html>
<head>
        <title>COMPRESSOR-5000</title>
        <meta charset="utf-8">
        <style type="text/css"></style>
        <link rel="stylesheet" type="text/css" href="CompressionMainCss.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">
        	

			 $(function(){
			  $('#BinaryInputArea').bind('input', function(){
			    $(this).val(function(_, v){
			     return v.replace(/\s+/g, '');
			    });
			  });
			});

        </script>

        <?php

        	error_reporting(0);
        	$value = "0001101010010111";
           if(isset($_GET['BinaryInputArea'])){

           	// GET BINARY CODE
             $GetBinaryCode = $_GET['BinaryInputArea'];

            // THROW GET COMPRESSED INTO TEMP
             $GetCompressedCode = $_GET['temp'];

            

           }


           if(isset($_GET['CompressionInputArea'])){
             $GetCompressedCode = $_GET['CompressionInputArea'];
             $GetBinaryCode = $_GET['temp'];

             
           }
        ?>

    </head>

    <body>
    	<!-- BINARY -> COMPRESSED CODE AREA -->
    	<div class="FIRSTFORM">
    	   <form action="#" method="GET">
    	   	<label>Insert Binary Code</label>
            <textarea onkeypress='return event.charCode >= 48 && event.charCode <= 49' id="BinaryInputArea" style="border: dashed 3px;" cols="34" rows="5" name="BinaryInputArea"></textarea>
                <br>
            <input type="submit" name="submit_BinaryValues" value="Compress">       
            <input type="hidden" name="temp" value ="<?php echo $CompressConversionArray//$GetCompressedCode;  ?>" />
                <br>
                <br>
            <label>Code Compressed</label>
            <textarea style="border: dashed 4px;" disabled="yes" cols="34" rows="5" name="COMPRESSION_OUTPUT"><?php

     	   // SPLIT BINARY CODE INTO 5 STRINGS
             $digits = str_split($GetBinaryCode, 4);

            // CREATE AN ARRAY FOR DIFFERENT DATA
             $BinaryCompressArray = array(

		           	"" => "",
				     " " => "",
				     "1" => "x",
				     "0" => "y",	
			  		 "00" => "Q",
				     "11" => "R",
				     "01" => "S",
				     "10" => "T",

				     "000" => "U",
				     "001" => "V",
				     "010" => "W",
				     "100" => "X",
				     "111" => "Y",
				     "110" => "Z",
				     "101" => "s",
				     "011" => "z",

				     "1111" => "A",
				     "1110" => "B",
				     "1101" => "C",
				     "1011" => "D",
				     "0111" => "E",	     						     
				     "0110" => "F",
				     "1001" => "G",
				     "0101" => "H",
				     "1010" => "I",
				     "0011" => "J",
				     "1100" => "K",
				     "1000" => "L",
				     "0100" => "M",
				     "0010" => "N",
				     "0001" => "O",
				     "0000" => "P"

				     // "11111" => "a",
				     // "11110" => "b",
				     // "11101" => "c",
				     // "11011" => "d",
				     // "10111" => "e",
				     // "01111" => "f",

				     // "10000" => "g",
				     // "01000" => "h",
				     // "00100" => "i",
				     // "00010" => "j",
				     // "00001" => "k",
				     // "00000" => "l",

				     // "01010" => "m",
				     // "10101" => "n",

				     // "01100" => "p",
				     // "00110" => "q",
				     // "00011" => "r",

				     // "11100" => "t",
				     // "11001" => "u",
				     // "10011" => "v",
				     // "00111" => "w",

				     // "10001" => "%",
				     // "11000" => "=",   
				     // "01110" => "o"


             );

             

             // DECLARE A PLACE TO HOLD OUTPUT VALUE FOR BINARY COMPRESSION
             $OutPutValue_HolderForB = "";

		             foreach ($digits as $val) {
		             	
		             	echo $BinaryCompressArray[$val];

		             	$OutPutValue_HolderForB = $OutPutValue_HolderForB . $BinaryCompressArray[$val];

		             }

		            
		             $BinaryLength = strlen($GetBinaryCode);

		             $CompressionLength = strlen($OutPutValue_HolderForB);                   

              ?></textarea>
              <hr>


              <!-- STATISTICS SECTION -->
				<table id="FirstTable" style="widows: 50%">
				  
				  <thead>
				  	<tr>
				  		<th class="headerOne" colspan="2" >Statistics</th>	
				  	</tr>
				  </thead>
				  	
				  	<tr>
				  		<th>Original Code:</th>
				  		<td><div class="SCROLL">
					  			<?php


					  		if (empty($GetBinaryCode)) {
					  			echo "#";

					  		} echo $GetBinaryCode;


					  		 ?></div></td>

				  		
				  	</tr>

				  	<tr>
				  	 	 <th>Original Code Length:</th>
       					 <td><?php echo $BinaryLength;  ?></td>
				  	</tr>

  					<tr>
				  	 	 <th>Compressed Output Code Length:</th>
       					 <td><?php  echo $CompressionLength;  ?></td>
				  	</tr>

				  	<tr>
				  	 	 <th>Compressed Amount:</th>
       					 <td><?php echo "-" . ($BinaryLength - $CompressionLength)  ?></td>
				  	</tr>

				  	<tr>
				  	 	 <th>0 Characters:</th>
       					 <td><?php echo substr_count($GetBinaryCode, 0);  ?></td>
				  	</tr>

				  	<tr>
				  	 	 <th>1 Characters:</th>
       					 <td><?php echo substr_count($GetBinaryCode, 1);  ?></td>
				  	</tr>

				</table>

  		  </form>
    	</div>

        <!-- COMPRESSED CODE -> BINARY AREA -->
        <div class="SECONDFORM">
        	  <form action="#" method="GET">
        	<label>Insert Compressed Code</label>
            <textarea style="border: double 3px;" cols="34" rows="5" name="CompressionInputArea"></textarea>
                <br>
            <input type="submit" name="submit_CompressedValues" value="Convert">     
            <input type="hidden" name="temp" value ="<?php echo $GetBinaryCode;  ?>" /> 
                <br>
                <br>
            <label>Code Converted</label>
            <textarea style="border: double 4px;" disabled="yes" cols="34" rows="5" name="CONVERSION_OUTPUT"><?php

               $digitsCompression = str_split($GetCompressedCode);
             $CompressConversionArray = array(

				   "" => " ",
				     " " => " ",
				     "x" => "1",
				     "y" => "0",	
			  		 "Q" => "00",
				     "R" => "11",
				     "S" => "01",
				     "T" => "10",
				     "U" => "000",
				     "V" => "001",
				     "W" => "010",
				     "X" => "100",
				     "Y" => "111",
				     "Z" => "110",
				     "s" => "101",
				     "z" => "011",
				     "A" => "1111",
				     "B" => "1110",
				     "C" => "1101",
				     "D" => "1011",
				     "E" => "0111",	     						     
				     "F" => "0110",
				     "G" => "1001",
				     "H" => "0101",
				     "I" => "1010",
				     "J" => "0011",
				     "K" => "1100",
				     "L" => "1000",
				     "M" => "0100",
				     "N" => "0010",
				     "O" => "0001",
				     "P" => "0000"

				     // "a" => "11111",
				     // "b" => "11110",
				     // "c" => "11101",
				     // "d" => "11011",
				     // "e" => "10111",
				     // "f" => "01111",

				     // "g" => "10000",
				     // "h" => "01000",
				     // "i" => "00100",
				     // "j" => "00010",
				     // "k" => "00001",
				     // "l" => "00000",

				     // "m" => "01010",
				     // "n" => "10101",

				     
				     // "p" => "01100",
				     // "q" => "00110",
				     // "r" => "00011",

				     // "t" => "11100",
				     // "u" => "11001",
				     // "v" => "10011",
				     // "w" => "00111",

				     // "o" => "01110",
				     // "=" => "11000",
				     // "%" => "10001"
				     

             );

             $OutPutValue_HolderForC = "";

             foreach ($digitsCompression as $valC) {

             	echo $CompressConversionArray[$valC];
             	$OutPutValue_HolderForC = $OutPutValue_HolderForC . $CompressConversionArray[$valC];

             }  

             $ConversionLength = strlen($GetCompressedCode);

             $UnpackagedLength = strlen($OutPutValue_HolderForC);

             ?></textarea>
            <hr>

            	<table id="SecondTable" style="widows: 50%">
				  
				  <thead>
				  	<tr>
				  		<th class="headerOne" colspan="2" >New Statistics</th>	
				  	</tr>
				  </thead>
				  	
			  		<tr>
				  		<th>Original Code:</th>
				  		<td><div class="SCROLL"><?php if (empty($GetCompressedCode)) {
				  			echo "#";
				  		}
				  			echo $GetCompressedCode; ;
				 	 	?></div></td>
				  	</tr>

				  	<tr>
				  	 	 <th>Original Code Length:</th>
       					 <td><?php echo $ConversionLength;  ?></td>
				  	</tr>

  					<tr>
				  	 	 <th>Converted Output Code Length:</th>
       					 <td><?php echo $UnpackagedLength; ?></td>
				  	</tr>

				  	<tr>
				  	 	 <th>Conversion Amount:</th>
       					 <td><?php echo "+" . ($UnpackagedLength - $ConversionLength) ;  ?></td>
				  	</tr>

				  	<tr>
				  	 	 <th>0 Characters:</th>
       					 <td><?php echo substr_count($OutPutValue_HolderForC, 0);  ?></td>
				  	</tr>

				  	<tr>
				  	 	 <th>1 Characters:</th>
       					 <td><?php echo substr_count($OutPutValue_HolderForC, 1);  ?></td>
				  	</tr>

				</table>


        </form>
        </div>
      
    </body>
    </html>