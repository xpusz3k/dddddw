<?
session_start();
?>

<?='<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl"><head>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
<title>tytuł strony</title></head><body>

<p><b>Wybierz towar ze sklepu</b> / <a href="koszyk.php">koszyk</a></p>
<?
//rozbijanie po przecinkach
$rozmiary = "XS,S,M,L,XL,XXL,XXXL";
$ilosci = "100 szt,200 szt,500 szt";

$tablicarozmiarow = explode(",", $rozmiary);
$tablicailosci = explode(",", $ilosci);

$ilerozmiarow=count($tablicarozmiarow);
$ileilosci = count($tablicailosci);


$sql_serwer = "";
$sql_login  = "";
$sql_haslo  = "";
$sql_baza   = "";
$sql_tabela = "produkty";

if (mysql_connect($sql_serwer, $sql_login, $sql_haslo)
 and mysql_select_db($sql_baza)) {
 $wynik = mysql_query("SELECT * FROM $sql_tabela");
 mysql_close();
}

if ($wynik) {

 echo "<table>";
 echo "<tr><th>produkt</th><th>rozmiar</th><th>cena</th><th> </th></tr>";
 while($dane = mysql_fetch_array($wynik)) {
   $id = $dane["id"];
   $towar = $dane["towar"];
   $cena = $dane["cena"];
 echo "<form action=\"koszyk.php?id=$id\" method=\"GET\">";
 echo '<input type="hidden" name="id" value="'.$id.'" />';
   echo "<tr><td>$towar</td>";

 echo "<td><select name='rozmiar'>";
	for ($i=0; $i <$ilerozmiarow; $i++)
	   {
	    echo "<option value=\"$tablicarozmiarow[$i]\">$tablicarozmiarow[$i]</option>";
	   }
	echo "</select></td>";

 echo "<td>$cena zł</td>";
   echo "<td><input type=\"submit\" value=\"dodaj do koszyka\" /></td>";


 echo "</tr>";
 echo "</form>";
}
 echo "</table>";
}
?>

</body>
</html>