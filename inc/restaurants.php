<?php

/**
 * Devuelve todo el listado de posts
 */
function get_all_restaurants()
{
    global $app_db;

    $result = mysqli_query($app_db, 'SELECT * FROM restaurants');
    if (!$result) {
        die(mysqli_error($app_db));
    }

    $restaurants = [];
    while ($restaurant = $result->fetch_assoc()) {
        $restaurants[] = $restaurant;
    }
    return $restaurants;
}

/**
 * Busca y devuelve un solo post
 * Si no lo encuentra, devuelve false
 */
function get_restaurant($restaurant_id)
{

    global $app_db;

    $query = 'SELECT * FROM restaurants WHERE id = ' . $restaurant_id;
    $result = mysqli_query($app_db, $query);
    if (!$result) {
        die(mysqli_error($app_db));
    }
    return mysqli_fetch_assoc($result);
}
