if_get('/{{ english_word_pluralize($entity_name) }}', function ()
{/*{^^{^^{*/
    $current_account = get_logined_account();

    return render('{{ $entity_name }}/list', [
        '{{ english_word_pluralize($entity_name) }}' => dao('{{ $entity_name }}')->find_all_order_by_id_desc(),
    ]);
});/*}}}*/