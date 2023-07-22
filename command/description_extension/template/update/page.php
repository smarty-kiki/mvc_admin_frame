<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>{{ $entity_info['display_name'] }}[{^^{ ${{ $entity_name }}->id }^^}]修改</title>
    <style>
        table {
            font-family: verdana,arial,sans-serif;
            font-size: 11px;
            color: #333333;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        table td {
            border-width: 0px;
            padding: 8px;
            background-color: #ffffff;
            text-align: left;
        }
        td:first-child {
            width: 100px;
            text-align: right;
        }
        .error {
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <form action='' method='POST' ajax="true">
        <input type="hidden" name="refer_url" value="^^{^^{ $refer_url ^^}^^}">
        <table>
            <tbody>
@foreach ($relationship_infos['relationships'] as $attribute_name => $relationship)
@if ($relationship['relationship_type'] === 'belongs_to')
                <tr>
                    <td>{{ $relationship['entity_display_name'] }}</td>
                    <td>
                        <select name='{{ $attribute_name }}_id'>
@if (! $relationship['require'])
                            <option value='0'>无</option>
@endif
@^^foreach (${{ english_word_pluralize($attribute_name) }} as $id => ${{ $attribute_name }})
                            <option value='^^{^^{ $id ^^}^^}' ^^{^^{ $id === ${{ $entity_name }}->{{ $attribute_name }}_id?'selected':'' ^^}^^}>^^{^^{ ${{ $attribute_name }}->display_for_{{ $relationship['self_attribute_name'] }}_{{ $attribute_name }}() ^^}^^}</option>
@^^endforeach
                        </select>
                    </td>
                </tr>
@endif
@endforeach
@foreach ($entity_info['struct_groups'] as $struct_group)
{{ blade_eval(_generate_template_struct_group_update($struct_group['type']), ['entity_name' => $entity_name, 'struct_group_info' => $struct_group['struct_group_info'], 'struct_group_structs' => $struct_group['structs'], 'struct_name_map' => $struct_group['struct_name_maps'], 'structs' => $entity_info['structs']]) }}
@endforeach
@foreach ($entity_info['structs'] as $struct_name => $struct)
@if (! isset($struct['struct_group_type']))
                <tr>
                    <td>{{ $struct['require']?'<span style="color:red;">*</span>':'' }}{{ $struct['display_name'] }}</td>
                    <td>
                        {{ blade_eval(_generate_template_data_type_update($struct['data_type']), ['entity_name' => $entity_name, 'struct_name' => $struct_name, 'struct' => $struct]) }}
                    </td>
                </tr>
@endif
@endforeach
                <tr>
                    <td><a href='javascript:window.history.back(-1);'>取消</a></td>
                    <td><input type='submit' value='保存'><span class="error"></span></td>
                </tr>
            </tbody>
        </table>
    </form>
    <script src="/js/zepto.min.js"></script>
    <script src="/js/mvc_admin.lib.js"></script>

</body>
</html>
