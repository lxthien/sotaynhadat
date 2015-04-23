
<style type="text/css">
.contactContainer{
	padding:5px;
}
.contactTable{
	width:400px;
}
</style>
<div class="contactContainer">
    <h1 style="text-align:center;">Thông tin phản hồi</h1>      
	<table class="contactTable" >
        <tr class="odd">
        	<td>Tiêu đề:<span style="color:#F00">*</span></td>
            <td><?=$contact->title;?></td>
        </tr>
        <tr  class="even">
        	<td>Họ tên:<span style="color:#F00">*</span></td>
            <td><?=$contact->name;?></td>
        </tr>
         <tr class="odd">
        	<td>Email:<span style="color:#F00">*</span></td>
            <td><?=$contact->email;?></td>
        </tr>
        <!--
        <tr class="even" >
        	<td>Điện thoại:</td>
            <td><?=$contact->phone;?></td>
        </tr>
        -->
         <tr class="odd" >
        	<td>Nội dung:<span style="color:#F00">*</span></td>
            <td><?=$contact->content;?></td>
        </tr>
    </table>
</div>
