<form target="_blank" id="frmLogin" class="FormLogin" name="frmLogin" onSubmit="return checkingtop(); _gaq.push(['_linkByPost', this]);" method="post" action="https://sso3.zing.vn/login">
        <fieldset>
        <legend>Form Đăng nhập</legend>
			<input id="username" type="text" onFocus="clearText(this,this.value);" onBlur="addText(this,this.value);" value="Tài khoản" class="TextAccount" name="u"  />
			<input id="password" type="password" onFocus="clearText(this,this.value);" onBlur="addText(this,this.value);" value="Tài khoản" class="TextPass" name="p" />
            <input type="submit" name="Submit" title="Chơi ngay" class="BtSearch" id="search" value="Chơi ngay" />

            <input type="hidden" name="u1" value="http://idgunny.zing.vn/">
            <input type="hidden" name="fp" value="http://idgunny.zing.vn/">
            <input type="hidden" name="pid" value="49">
        </fieldset>
</form>