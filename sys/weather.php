<?php
$cache_file = 'data.json';

if (file_exists($cache_file)) {
    $data = json_decode(file_get_contents($cache_file));
} else {
    $api_url = 'https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
    $data = file_get_contents($api_url);
    file_put_contents($cache_file, $data);
    $data = json_decode($data);
}

if (isset($data->results->current)) {
    $current = $data->results->current[0];
} else {
    $current = null;
}

if (isset($data->results->seven_day_forecast)) {
    $forecast = $data->results->seven_day_forecast;
} else {
    $forecast = [];
}
?>

<?php
function convert2cen($value, $unit)
{
    if ($unit == 'C') {
        return $value;
    } elseif ($unit == 'F') {
        $cen = ($value - 32) / 1.8;
        return round($cen, 2);
    }
}
?>

<br>

<div class="row">
    <h3 class="title text-center bordered">Weather Report for <?php
        if ($current !== null && isset($current->city) && isset($current->country)) {
            echo $current->city . ' (' . $current->country . ')';
        } else {
            echo "N/A";
        }
        ?></h3>

    <div class="col-md-12" style="padding-left:0px;padding-right:0px;">
        <div class="single bordered" style="padding-bottom:25px;background:url('back.jpg') no-repeat ;border-top:0px;background-size: cover;">
            <div class="row">
                <div class="col-sm-9" style="font-size:20px;text-align:left;padding-left:70px;">
                    <p class="aqi-value"><?php
                        if ($current !== null && isset($current->temp) && isset($current->temp_unit)) {
                            echo convert2cen($current->temp, $current->temp_unit) . ' °C';
                        } else {
                            echo "N/A";
                        }
                        ?></p>

                    <p class="weather-icon">
                        <?php if ($current !== null): ?>
                            <img style="margin-left:-10px;" src="<?php echo $current->image ?? ''; ?>">
                            <?php echo $current->description ?? ''; ?>
                        <?php endif; ?>

                    </p>
                    <div class="weather-icon">
                        <p><strong>Wind Speed : </strong><?php echo $current->windspeed ?? 'N/A'; ?> <?php echo $current->windspeed_unit ?? ''; ?></p>
                        <p><strong>Pressue : </strong><?php echo $current->pressure ?? 'N/A'; ?> <?php echo $current->pressure_unit ?? ''; ?></p>
                        <p><strong>Visibility : </strong><?php echo $current->visibility ?? 'N/A'; ?> <?php echo $current->visibility_unit ?? ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <h3 class="title text-center bordered">5 Days Weather Forecast for <?php echo $current !== null && isset($current->city) && isset($current->country) ? $current->city . ' (' . $current->country . ')' : 'N/A'; ?></h3>
    <?php foreach ($forecast as $f): ?>
        <div class="single forecast-block bordered">
            <h3><?php echo $f->day ?? 'N/A'; ?></h3>
            <p style="font-size:1em;" class="aqi-value">
                <?php echo isset($f->low) && isset($f->low_unit) ? convert2cen($f->low, $f->low_unit) . ' °C' : 'N/A'; ?>
                - <?php echo isset($f->high) && isset($f->high_unit) ? convert2cen($f->high, $f->high_unit) . ' °C' : 'N/A'; ?>
            </p>
            <hr style="border-bottom:1px solid #fff;">
            <img src="<?php echo $f->image ?? ''; ?>">
            <p><?php echo $f->phrase ?? ''; ?></p>
        </div>
    <?php endforeach; ?>
</div>
