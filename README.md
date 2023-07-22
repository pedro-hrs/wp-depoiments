# WP Depoiments

Plugin para inserção de depoimentos em projetos wordpress.

### Como funciona?

1. Instale o tema
2. Cadastre os depoimentos através do menu principal do painel.
3. Insira o shortcode ``[depoimentos]`` de depoimentos. Para inserir em templates de pagina use a função ``do_shortcode('depoimentos')``

### Como estilizar?

``.wp-depoiments`` Classe que envolve todo o bloco de depoimentos

``.wp-depoiments-wrapper`` Classe que envolve cada depoimento individualmente

``.wp-depoiments-title`` Classe do H3 com titulo do depoimento

``.wp-depoiments-text`` Classe do conteúdo do depoimento

``.wp-depoiments-dots`` Classe dos marcadores de depoimentos

Use os parametros ``color`` e/ou ``align``para alterar a cor de destaque e alinhar o conteúdo.

``[depoimentos color="#FF0000" align="center"]``
