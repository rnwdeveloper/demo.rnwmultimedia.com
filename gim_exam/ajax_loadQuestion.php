<?php

    ob_start();
    session_start();

    include('config.php');

    $id = $_POST['ids'];


?>

<div class="form-group col-12" id="loadedQuestion">
    <label for="option">13. If for some reason you cannot proceed to the field selected above, which other field
        should you select?<span class="ml-2"><br>(કોઈ કારણો સર ઉપર Select કરેલી ફિલ્ડમાં આગળ નથી જઈ શકતા તો
            બીજી કઈ Field સિલેક્ટ કરશો?):</span></label>
    <div>
        <div class="form-check form-check-inline" style="display:<?php if($id==1){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option1" name="option" value="1">
            <label class="form-check-label" for="option1">Game Design</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==2){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option2" name="option" value="2">
            <label class="form-check-label" for="option2">Front-end Design</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==3){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option3" name="option" value="3">
            <label class="form-check-label" for="option3">Graphics</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==4){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option4" name="option" value="4">
            <label class="form-check-label" for="option4">Animation</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==5){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option5" name="option" value="5">
            <label class="form-check-label" for="option5">Android Development</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==6){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option6" name="option" value="6">
            <label class="form-check-label" for="option6">IOS Development</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==7){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option7" name="option" value="7">
            <label class="form-check-label" for="option7">Web Development</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==8){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option8" name="option" value="8">
            <label class="form-check-label" for="option8">Game Development</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==9){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option9" name="option" value="9">
            <label class="form-check-label" for="option9">Front-end Development</label>
        </div>
        <div class="form-check form-check-inline" style="display:<?php if($id==10){echo "none";} else{echo "";} ?>">
            <input class="form-check-input" type="radio" id="option10" name="option" value="10">
            <label class="form-check-label" for="option10">Flutter Development</label>
        </div>
    </div>
</div>