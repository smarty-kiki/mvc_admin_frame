@php
$range_datetime_name = $struct_group_info['name'].'_range_datetime';
$range_datetime_variable_name = '$'.$range_datetime_name;
$range_datetime_explode_variable_name = '$'.$struct_group_info['name'].'_range_datetime_explode';
@endphp
    {{ $range_datetime_variable_name }} = input('{{ $range_datetime_name }}');
    if ({{ $range_datetime_variable_name }}) {
        {{ $range_datetime_explode_variable_name }} = explode(' - ', {{ $range_datetime_variable_name }});
        ${{ $struct_name_map['$(name)_start_time'] }} = {{ $range_datetime_explode_variable_name }}[0];
        ${{ $struct_name_map['$(name)_end_time'] }} = {{ $range_datetime_explode_variable_name }}[1];
    }
