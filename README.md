# Grav Shortcode Google Publisher Tag Plugin

## About

The **Shortcode GPT** Plugin is for [Grav CMS](http://github.com/getgrav/grav). It provides a Google Publisher Tag as _shortcode_. As such it requires the **Shortcode Core plugin** to function.

## Installation

Installing the Shortcode Gpt plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install shortcode-gpt

This will install the Shortcode Gpt plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/shortcode-gpt`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `shortcode-gpt`. You can find these files on [GitHub](https://github.com/keosion/grav-plugin-shortcode-gpt) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /user/plugins/shortcode-gpt

> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/shortcode-gpt/shortcode-gpt.yaml` to `user/config/plugins/shortcode-gpt.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
cssClasses: ""
```

**cssClasses** contains any CSS classes you want to add to the ad's div container. By default, it already is "reclameContainer". For example, if cssClasses is set to "myClass myOther", the div tag will then be
```
<div class="reclameContainer myClass myOther">The Ad</div>
```

## Usage

- Generate your Google Publisher tag. Body's code should look like this :
```
<!-- /13895773/MyCustomSlot -->
<div id='div-gpt-ad-1508957893048-0' style='height:250px; width:300px;'>
  <script>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1508957893048-0'); });
  </script>
</div>
```
- Note the slot name : **/13895773/MyCustomSlot**. You can also find this name in Google Publisher head's code : it's the first parameter in _defineSlot_ call.
- Note the width : **300**
- Note the height : **250**
- Include the _GooglePublisherTag_ shortcode in any page using your slot informations :
```
[GooglePublisherTag slot="/13895773/MyCustomSlot" width="300" height="250"][/GooglePublisherTag]
```

## Credits

Thanks to [Grav Adsense plugin](https://github.com/muuvmuuv/grav-plugin-adsense) for inspiration.
This plugin is used on [UtagawaVTT's blog](https://blog.utagawavtt.com).

