if_get('/{{ english_word_pluralize($entity_name) }}/add', function ()
{/*{^^{^^{*/
    return render('{{ $entity_name }}/add', [
@foreach ($relationship_infos['relationships'] as $attribute_name => $relationship)
@if ($relationship['relationship_type'] === 'belongs_to')
        '{{ english_word_pluralize($attribute_name) }}' => dao('{{ $relationship['entity'] }}')->find_all(),
@endif
@endforeach
    ]);
});/*}}}*/

if_post('/{{ english_word_pluralize($entity_name) }}/add', function ()
{/*{^^{^^{*/
@php
$input_infos = [];
$param_infos = [];
$setting_lines = [];
foreach ($relationship_infos['relationships'] as $attribute_name => $relationship) {
    $entity = $relationship['entity'];
    if ($relationship['relationship_type'] === 'belongs_to') {
        if ($relationship['association_type'] === 'composition') {
            $param_infos[] = "input_entity('$entity', null, '$attribute_name"."_id')";
        } else {
            $setting_lines[] = "$$entity_name->$attribute_name = dao('$entity')->find(input('{$attribute_name}_id'))";
        }
    }
}
foreach ($entity_info['structs'] as $struct_name => $struct) {
    $input_infos[] = "$$struct_name = input('$struct_name')";

    if ($struct['require']) {
        $param_infos[] = "$$struct_name";
    } else {
        $setting_lines[] = "$$entity_name->$struct_name = $$struct_name";
    }
}
@endphp
@foreach ($input_infos as $input_info)
    {{ $input_info }};
@endforeach

@if ($entity_info['repeat_check_structs'])
@php
$repeat_check_structs = $entity_info['repeat_check_structs'];
$dao_param_infos = [];
$msg_infos = [];
foreach ($repeat_check_structs as $struct_name) {
    $dao_param_infos[] = "$$struct_name";
    $msg_infos[] = $entity_info['structs'][$struct_name]['display_name'];
}
@endphp
    $another_{{ $entity_name }} = dao('{{ $entity_name }}')->find_by_{{ implode('_and_', $repeat_check_structs) }}({{ implode(', ', $dao_param_infos) }});
    otherwise($another_{{ $entity_name }}->is_null(), '已经存在相同{{ implode('和', $msg_infos) }}的{{ $entity_info['display_name'] }} [ID: '.$another_{{ $entity_name }}->id.']');
@endif

@if (empty($param_infos))
    ${{ $entity_name }} = {{ $entity_name }}::create();
@else
    ${{ $entity_name }} = {{ $entity_name }}::create(
        {{ implode(",\n        ", $param_infos)."\n" }}
    );
@endif
@if (! empty($setting_lines))

@foreach ($setting_lines as $setting_line)
    {{ $setting_line }};
@endforeach
@endif

    return redirect('/{{ english_word_pluralize($entity_name) }}');
});/*}}}*/
