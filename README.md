# twig-hex-color-change-extension
Twig extension to lighten or darken a given hex value by 20%, or to shade it by a given %

## Installation

Install via composer:
```
composer require mattgxyz/twig-hex-color-changeextension
```

Add the following to your services.yml file:
```yaml
  twig.extension.hexcolorchange:
    class: MattgXyz\Twig\HexColorChangeExtension
    tags:
        - { name: twig.extension 
```

## Usage
```
{{ '#336699' | darken }}
{{ '#336699' | lighten }}
{{ '#336699' | shade(60) }}

```
