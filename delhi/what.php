<?php
if(isset($_POST['add'])){?>
  <form action="" method="post"><table align="center" ><br><br>
<tr>QUESTION:<input type="text" name="qtn" value="" placeholder="please enter your question" size="75" ><br /><br></tr>
<tr><td>marks:<input type="text" name="a" value="" placeholder="weightage" ><br><br></td>
</tr>

</table>
<input type="submit" name="button" value="END"  style="text_align:left; background-color: red; color: white;" >
<input type="submit" name="submit" value="SUBMIT" style="text_align:right; background-color: green; color: white;"  >
<a href="createquestion.php">shift to multiple</a>


</form> 

 <?php
}?>