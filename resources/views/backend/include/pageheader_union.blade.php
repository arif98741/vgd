<div class="pageheader">
    <div class="media">

        <div class="pull-left">
            <div class="pageicon pull-left">
                <i class="fa fa-dashboard"></i>
            </div>
            <div class="media-body">
                <h4>&nbsp; {{ $unionName }} ইউনিয়ন ভিজিডি ড্যাশবোর্ড</h4>
            </div>
        </div>

        <div class="pull-right">
            <div class="pageicon pull-left">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="media-body">
                <h4>&nbsp; আজকের বিতরণঃ <span
                        style="font-family:SutonnyMJ; font-size: 25px;">{{ $today->total }}</span>বস্তা, গতকালকের বিতরণঃ <span
                        style="font-family:SutonnyMJ; font-size: 25px;">{{ $yesterday->total }}</span> বস্তা</h4>
            </div>
        </div>
    </div><!-- media -->




</div><!-- pageheader -->
