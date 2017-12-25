<div class="panel panel-default">
    <div class="panel-heading"><strong>Looks like {{ $affiliate['first_name'] }} invited you, {{ $friend['first_name'] }}</strong></div>

    <div class="panel-body">

        <img class="pull-left" style="margin: 0 20px 10px 0;" src="https://dummyimage.com/300x280/000/fff" alt="alt">

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan malesuada mi, sed porta mi vestibulum vitae. Nunc non turpis risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent dolor metus, pellentesque sed vehicula id, sollicitudin ac elit. Phasellus id lacus id metus blandit placerat. Pellentesque aliquet vitae nibh sed iaculis. Pellentesque lobortis magna ipsum, at rhoncus leo congue faucibus. Aenean auctor magna nisl, id facilisis est dapibus a.</p>
        <br>

        <p>Cras eu imperdiet tortor. Vivamus ornare, tortor vel egestas finibus, purus massa fringilla mauris, nec varius elit mi sed quam. Cras in dapibus arcu. Sed finibus dui eget viverra cursus. Nulla auctor, ipsum eget pharetra lobortis, nisl diam blandit libero, et porta tellus leo ut dolor. Aenean quis ex eu mauris convallis ultrices. Sed augue augue, tincidunt sit amet imperdiet ut, blandit vel nisl. Sed in est eu ante luctus imperdiet vel vel nulla. Duis lacinia viverra ligula, sit amet tincidunt ex sollicitudin id. Integer nec metus laoreet nisl hendrerit porta vel ac neque. Maecenas facilisis tortor eu velit imperdiet pulvinar. Nulla sit amet eros sit amet urna hendrerit convallis. Aliquam vulputate fermentum leo. Morbi mollis ex vitae mauris accumsan, sed facilisis ex suscipit. Nullam scelerisque eros massa, a egestas orci semper sed.</p>
        <br>

        <p>{{ $affiliate['first_name'] }} gave you a $100 discount...You get in for only <strike><b>$297</b></strike> <b>$197</b>/month</p>
        <br>
        <center>
            <a href="{{ route('order', ['affiliateid'=> $affiliate['thrivecart_affiliate_id'], 'coupon'=>$invite->coupon]) }}" style="text-decoration: none; background: green; font-size: 17px; padding: 22px 60px; color: white; display: inline-block;">I WANT IN!</a>&nbsp;&nbsp;
            <a href="{{action('KkicController@follow', ['id'=>$friend['id']])}}" style="text-decoration: none; background: orange; font-size: 17px; padding: 22px 60px; color: white; display: inline-block;">I WANT MORE INFO...</a>
        </center>
    </div>
</div>