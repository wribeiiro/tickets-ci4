<?php

function returnDaysOfMonth() {

    $lastDay = date("Y-m-t", strtotime('today'));

    for ($data = strtotime(date('Y-m-01')); $data <= strtotime($lastDay); $data = strtotime("+1 day", $data)):
        $arrayData[] = date("d", $data);
    endfor;

    return $arrayData;
}

function convertDateTime(string $dateStr): string {
    $date = str_replace('/', '-', $dateStr);
    
    return date('Y-m-d', strtotime($date)) . ' ' . date('H:i:s');
}

/**
 * Undocumented function
 *
 * @param string $dateStr
 * @return string $date
 */
function convertDate(string $dateStr): string {
    if ($dateStr != '') {
        $date = str_replace('/', '-', $dateStr);
    
        return date('Y-m-d', strtotime($date));
    } 
    
    return NULL;
}

/**
 * Undocumented function
 *
 * @param string $str
 * @return string
 */
function returnStrYearMonth(string $str): string {
    switch ($str) {
        case '01': return 'Jan';
        case '02': return 'Fev';
        case '03': return 'Mar';
        case '04': return 'Abr';
        case '05': return 'Mai';
        case '06': return 'Jun';
        case '07': return 'Jul';
        case '08': return 'Ago';
        case '09': return 'Set';
        case '10': return 'Out';
        case '11': return 'Nov';
        case '12': return 'Dez';
    }
}

/**
 * Undocumented function
 *
 * @param string $monthYear
 * @return string
 */
function returnYearMonthStr(string $monthYear): string {
    switch ($monthYear) {
        case 'Jan': return '01';
        case 'Fev': return '02';
        case 'Mar': return '03';
        case 'Abr': return '04';
        case 'Mai': return '05';
        case 'Jun': return '06';
        case 'Jul': return '07';
        case 'Ago': return '08';
        case 'Set': return '09';
        case 'Out': return '10';
        case 'Nov': return '11';
        case 'Dez': return '12';
    }
}

/**
 * Undocumented function
 *
 * @return array
 */
function returnStringMonths(): array {
    return array(
        'Jan', 
        'Fev', 
        'Mar', 
        'Abr', 
        'Mai', 
        'Jun', 
        'Jul', 
        'Ago', 
        'Set', 
        'Out', 
        'Nov', 
        'Dez'
    );
}

/**
 * Retorna array com os ultimos 12 meses 
 *
 * @return array
 */
function returnLast12Months(): array {
    
    for ($i = 0; $i < 12; $i++) {
        $str          = date('m/Y', strtotime("-$i month"));
        $months[$str] = $str;
    }

    return $months;
}