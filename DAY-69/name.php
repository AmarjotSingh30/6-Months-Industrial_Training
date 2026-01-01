<?php
// input text
$text="exampletext";

// regular expression to allow only alphabets(both uppercase and lowercase)
if(preg_match('/^[a-zA-Z]+$/',$text)){
    echo"the text contains only alphabets";
}
else{
    echo"the text contains invalid chracters";
}
?>