@extends('layouts.app')
@section('content')
<div class="wrapper" ng-controller="intermediate">

    <div class="table-responsive col-md-12">
        <h3>COCOMO II Cost Drivers </h3>
        <div class="col-md-4">
            <fieldset class="fsStyle">
                <legend class="legendStyle">
                    <a data-toggle="collapse" data-target="#demo" href="#">Personal</a>
                </legend>
                <div class="row collapse in" id="demo">
                    <div class="col-md-4">
                        <button class="btn btn-default" title="Analyst capability">ACAP</button>
                        <button class="btn btn-default" title="Applications experience">AEXP</button>
                        <button class="btn btn-default" title="Software engineer capability">PCAP</button>
                        <button class="btn btn-default" title="Virtual machine experience">VEXP</button>
                        <button class="btn btn-default" title="Programming language experience">LEXP</button>
                     </div>

                    <div class="col-md-2 per">
                        <select ng-model="acap" ng-init="acap ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="aexp" ng-init="aexp ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="pcap" ng-init="pcap ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="vexp" ng-init="vexp ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="lexp" ng-init="lexp ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-4">
            <fieldset class="fsStyle">
                <legend class="legendStyle">
                    <a data-toggle="collapse" data-target="#demo" href="#">Platform</a>
                </legend>
                <div class="row collapse in" id="demo">
                    <div class="col-md-4">
                        <button class="btn btn-default" title="Run-time performance constraints">TIME</button>
                        <button class="btn btn-default" title="Memory constraints">STOR</button>
                        <button class="btn btn-default" title="Volatility of the virtual machine environment">VIRT</button>
                        <button class="btn btn-default" title="Required turnabout time">TURN</button>
                    </div>
                    <div class="col-md-2 per">
                        <select ng-model="time" ng-init="time ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="stor" ng-init="stor ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="virt" ng-init="virt ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="turn" ng-init="turn ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-4">
            <fieldset class="fsStyle">
                <legend class="legendStyle">
                    <a data-toggle="collapse" data-target="#demo" href="#">Product</a>
                </legend>
                <div class="row collapse in" id="demo">
                    <div class="col-md-4">
                        <button class="btn btn-default" title="Required software reliability">RELY</button>
                        <button class="btn btn-default" title="Size of application database">DATA</button>
                        <button class="btn btn-default" title="Complexity of the product">CPLX</button>
                    </div>
                    <div class="col-md-2 per">
                        <select ng-model="rely" ng-init="rely ='N'"  ng-change="doCalculation()" >
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="dat" ng-init="dat ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="cplx" ng-init="cplx ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-4">
            <fieldset class="fsStyle">
                <legend class="legendStyle">
                    <a data-toggle="collapse" data-target="#demo" href="#">Project</a>
                </legend>
                <div class="row collapse in" id="#">
                    <div class="col-md-4">
                        <button class="btn btn-default" title="Application of software engineering methods">MODP</button>
                        <button class="btn btn-default" title="Use of software tools">TOOL</button>
                        <button class="btn btn-default" title="Required development schedule">SCED</button>
                    </div>
                    <div class="col-md-2 per">
                        <select ng-model="modp" ng-init="modp ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="tool" ng-init="tool ='N'"  ng-change="doCalculation()"    >
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                        <select ng-model="sced" ng-init="sced ='N'"  ng-change="doCalculation()">
                            <option value="VH">Very High</option>
                            <option value="H">High</option>
                            <option value="N">Nominal</option>
                            <option value="L">Low</option>
                            <option value="VL">Very Low</option>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-4">
            <fieldset class="fsStyle">
                <legend class="legendStyle">
                    <a data-toggle="collapse" data-target="#demo" href="#">Size Summary</a>
                </legend>
                <div class="row collapse in" id="demo">
                    <div class="col-md-3">
                        <label class="control-label">Size</label>
                        <label class="control-label">Method</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" ng-model="sloc"  id="size" name="size" value="0" ng-change="doCalculation()">
                        <label class="control-label">SLOC</label>
                        <a class="btn btn-primary" ng-click="doCalculation()">Calculate</a>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <table class="table table-bordered" style="width: 80%;">
                <thead>
                <tr>
                    <td>Total Effort Required</td>
                    <td><span id="effort"></span>(SLOC)</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Total Development Time</td>
                    <td><span id="develop"></span>0.0 (PM)</td>
                </tr>
                <tr>
                    <td>Staff Required</td>
                    <td><span id="staff"></span>0.0 (PM)</td>
                </tr>
                </tbody>

            </table>
            <table class="table table-bordered "  style="width: 80%;">
             <thead>
                <tr>
                    <td>Mode</td>
                    <td><select ng-model="class" ng-init="class='O'" ng-change="doCalculation()">
                            <option value="O">Organic</option>
                            <option value="S">SEMIDETACHED</option>
                            <option value="E">EMBEDDED</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Average Salary</th>
                    <th><input size="4" type="text" ng-model="salary" ng-init="salary=1000" ng-change="changeCost()"/> (PM)</th>
                </tr>
                <tr>
                    <th><h3>Total Cost</h3></th>
                    <th><h3>$<span id="cost"></span></h3>   </th>
                </tr>
                </thead>
            </table>
        </div>


    </div>
</div>
    <!-- for dropdown -->


@endsection
@push('scripts')
<script>
    $('select').dropdown({
        // <a href="http://www.jqueryscript.net/animation/">Animation</a>
        speed: 200,
        easing: 'easeInOutCirc',
        // Positioning
        margin:         20,
        collision:      true,
        autoResize:     200,
        scrollSelected: true,
        // Keyboard navigation
        keyboard: true,
        // Nesting
        nested: true,
        selectParents: false,
        // Multiple
        multi:     false,
        maxSelect: false,
        minSelect: false,
        // Links
        selectLinks: false,
        followLinks: true,
        // Close
        closeText:     'Close',
        autoClose:     true,
        autoCloseMax:  true,
        autoCloseLink: true,
        closeReset:    true,

        // Back
        backText: 'Back',

        // Toggle
        toggleText:    'Please select',
        autoToggle:     true,
        autoToggleLink: false,
        autoToggleHTML: false,

        // Title
        titleText: 'Please select',
        autoTitle: true,

        // Custom classes
        classes: {},

        // Custom templates
        templates: {}

    });


</script>
<script src="{{URL('js/intermediate.js')}}"></script>
@endpush
