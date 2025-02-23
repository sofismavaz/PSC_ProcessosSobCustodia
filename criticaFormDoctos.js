function datetimeField(field) {
    field = field || 'datetime';
    return {
        type: 'datetime',
        name: field,
        label: 'Data e hora',
        required: true,
        placeholder: 'Data e hora',
        readonly: true,
        value: new Date().toISOString().slice(0, 16)
    };
}

function textAreaField(field) {
    field = field || 'observaciones';
    return {
        type: 'textarea',
        name: field,
        label: 'Observaciones',
        required: true,
        placeholder: 'Observaciones'
    };
}

