@extends('layouts.app')
@section('content')
<div class="wrapper" ng-controller="basic">
    <div class="container">
        <div class="table-responsive col-md-8">
            <table class="table table-bordered ">
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
        </div>
        <div class="table-responsive col-md-4">
            <table class="table table-bordered ">

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
                    <th><h3><span id="cost"></span>$</h3>   </th>
                </tr>
                </thead>
            </table>
        </div>
        <!-- fieldset collapse start -->


    </div>
    <div class="table-responsive col-md-12">


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
<script src="{{URL('js/basic.js')}}"></script>
@endpush
