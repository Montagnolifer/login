<?php
// Exemplo de JSON ajustado para a solicitação
$exemploJsonTraining = '{
    "activities": [
        {
    "title": "Corrida de 5km ao entardecer",
    "heating": "Faça uma caminhada leve de 5 minutos seguida de alongamentos dinâmicos.",
    "cooldown": "Caminhe lentamente por 5 minutos e depois faça alongamentos estáticos.",
    "tip": "Mantenha uma respiração constante e ajuste seu ritmo conforme necessário.",
    "date": "2024-06-18",
    "type": "' . $type . '",
    "conditions": [
        {
            "operation": ">=",
            "type": "distance",
            "value": "5"
        },
        {
            "operation": "<",
            "type": "pace",
            "value": "6"
        }
    ]
        }
    ]
}';

// Comando melhorado para a OpenAI
$comandoTraining = "
Crie um plano de atividades especializado para o usuário baseado nas informações do usuário fornecidas: 
" . json_encode($answers) . ", e nas atividades realizadas nos últimos 30 dias: " . json_encode($activities) . ".

Objetivo: Criar atividades especializadas para melhorar " . $category . " nos próximos 7 dias a partir da data de hoje: " . $dataAtual . ".

A resposta deve ser estritamente em formato JSON, com uma lista de atividades contendo os seguintes campos:

- **title** (String): Título da atividade.
- **heating** (String): Aquecimento para realizar antes da atividade.
- **cooldown** (String): Desaquecimento para realizar após a atividade.
- **tip** (String): Dica de como realizar a atividade da melhor forma.
- **date** (Date): Data para realizar a atividade.
- **type** (String): Tipo da atividade (Run, Ride, Walk).
- **conditions** (Array): Conjunto de condições específicas para a atividade, exemplo:
  - operation = '>=',
  - type = 'distance',
  - value = '10',
  - operation = '<',
  - type = 'pace',
  - value = '5'.

**Exemplo Estruturado de Resposta:**
" . $exemploJsonTraining . "

**Instruções Importantes:**
- **A estrutura do JSON deve ser seguida rigorosamente** como no exemplo fornecido.
- **Não inclua** textos explicativos, formatações, ou qualquer outro conteúdo fora do JSON.
- **Foque somente no JSON com as atividades** e mantenha o formato exato, apenas alterando os valores conforme necessário para cada atividade.
- As condições devem usar os tipos exatamente como aparecem na API do Strava, como 'type = distance'.
- **Não altere os nomes das variáveis** do JSON, elas devem permanecer idênticas às do exemplo.

A saída deve ser um JSON puro, pronto para ser lido e processado.
";

// Envie o comando ajustado para a OpenAI
