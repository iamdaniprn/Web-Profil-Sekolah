<div class="overflow-hidden rounded">
  <div class="p1 bold center" style="background: #03c129; color: white">
    Identitas Sekolah
  </div>
  <div class="p2" style="background: #e4e3e5">
    <p><b>NPSN</b> : 20227858</p>
    <p><b>Status</b> : Swasta</p>
    <p><b>Bentuk Pendidikan</b> : SMA</p>
    <p><b>Status Kepemilikan</b> : Yayasan</p>
    <p><b>SK</b> : 277/102/Kep/E.1992</p>
    <p><b>Tanggal SK</b> : 1992-07-25</p>
  </div>
</div>
	<div class="overflow-hidden rounded mt1">
  <div class="p1 bold center" style="background: #03c129; color: white">
    Sarana dan Prasarana
  </div>
  <div class="p2" style="background: #e4e3e5">
    <p>1. Lapangan Parkir</p>
    <p>2. Lapangan Olah Raga</p>
    <p>3. Ruang Kelas</p>
    <p>4. Ruang Video Visual</p>
    <p>5. Laboratorium</p>
    <p>6. Perpustakaan</p>
    <p>7. Ruang UKS</p>
    <p>8. Ruang OSIS</p>
    <p>9. Kantin</p>
  </div>
</div>
<div class="overflow-hidden rounded mt1">
  <div class="p1 bold center" style="background: #03c129; color: white">
    Kalender
  </div>
  <div class="p1"  style="background: #e4e3e5">
    <?php
$month= date ("m");
$year=date("Y");
$day=date("d");
$endDate=date("t",mktime(0,0,0,$month,$day,$year));
echo '<font face="arial" size="2">';
echo '<table align="center" border="0" cellpadding=3 cellspacing=5><tr><td align=center>';
echo "Tanggal Hari ini : ".date("F, d Y ",mktime(0,0,0,$month,$day,$year));
echo '</td></tr></table>';
echo '<table align="center" border="0" style="font-size:11px" cellpadding=0 cellspacing=1 style="border:1px solid #CCCCCC" style="font-size=5">
<tr bgcolor="#03c129">
<td align=center><font color=red>Minggu</font></td>
<td align=center>Senin</td>
<td align=center>Selasa</td>
<td align=center>Rabu</td>
<td align=center>Kamis</td>
<td align=center>Jumat</td>
<td align=center>Sabtu</td>
</tr>';
$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
echo "<td style=\"font-family:arial;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFFFFF\">
</td>";}
for ($d=1;$d<=$endDate;$d++) {
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
$fontColor="#000000";
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }
echo "<td style=\"font-family:arial;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }}
echo '</table>';
?>

  </div>
</div>