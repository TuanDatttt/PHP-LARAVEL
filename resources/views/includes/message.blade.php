@if (session('status'))
<p style="color: white; background: #5cb85c; width:max; height: 30px; font-size: 18px ;
 text-align: center; margin-bottom : 10px;padding-top: 5px;" >{{ session('status') }}</p>
@endif