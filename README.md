# uf-wysiwyg-web-editor-adapter
UserFrosting Sprinkle to allow usage with a Wysiwyg web builder

## Installing

Modify your sprinkles.json with the following:

```
{
    "require": {
        "archey347/uf-wysiwyg-web-editor-adapter ": "~v0.0.1-beta"
    },
    "base": [
        "core",
        "account",
        "admin",
        "WAdapter"
    ]
}
```
