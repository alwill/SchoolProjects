<?php
date_default_timezone_set("America/Chicago");

function get_time($offset){
    /*
        Plan is to somehow use offset to add 30 minutes per offset
        Not sure how to do that, or if that method would be best.
    */
    $hours = date('h');
    $minutes = (date('i') > 30) ? '30' : '00';
    return "$hours:$minutes" . date('A');
}

function build_guide(){
    /*
        This builds the guide. Currently using hardcoded data. 
        Not sure how to go about this.
    */
    echo '
    <div>
            <h3 class="page-header">What\'s Currently On?</h3>
            <table class="table table-striped">
                <thead>
                    <th class="col-md-3" scope="col"><a href="#">&#9664;</a></th>
                    <th scope="col">' . get_time(0) . '</th>
                    <th scope="col">' . get_time(0) . '</th>
                    <th scope="col">' . get_time(0) . '</th>
                    <th scope="col">' . get_time(0) . '</th>
                    <th scope="col">' . get_time(0) . '</th>
                    <th scope="col">' . get_time(0) . '</th>
                    <th scope="col">' . get_time(0) . '</th>
                    <th scope="col"><a href="#">&#9654;</a></th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>CBS</strong>
                            <span class="show h6">Channel 2</span>
                        </td>
                        <td colspan="2">Madam Secretary</td>
                        <td colspan="2"><a href="thegoodwife.html">The Good Wife</a></td>
                        <td colspan="2">CSI: Cyber</td>
                        <td colspan="2">Forty Eight Hours</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>ABC</strong>
                            <span class="show h6">Channel 30</span>
                        </td>
                        <td colspan="2">Once Upon A Time</td>
                        <td colspan="2">Blood and Oil</td>
                        <td colspan="2">Quantico</td>
                        <td colspan="2">Forty Eight Hours</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>NBC</strong>
                            <span class="show h6">Channel 5</span>
                        </td>
                        <td colspan="5">Football: Saints at Cowboys</td>
                        <td colspan="3">Local Programming</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>FOX</strong>
                            <span class="show h6">Channel 4</span>
                        </td>
                        <td colspan="2">Brookly Nine-Nine</td>
                        <td colspan="2">Family Guy</td>
                        <td colspan="2">The Last Man on Earth</td>
                        <td colspan="2">Local Programming</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>PBS</strong>
                            <span class="show h6">Channel 11</span>
                        </td>
                        <td colspan="2">Indian Summers On Masterpiece</td>
                        <td colspan="1">The Widower</td>
                        <td colspan="2">Ask This Old House</td>
                        <td colspan="3">Hometime</td>
                    </tr>
                </tbody>
            </table>
        </div>
        ';
}
