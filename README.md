# Anonymise

This tool will place a `.metadata_never_index` at specific directories to prevent them being indexed by Spotlight.

## Installing

### Via Homebrew
@todo set this up

### Manually


## Configuring
Place a file at `~/.anonymiserc` with the configuration array you wish to use, as a JSON object.

## Building

This project uses `box` to build the PHAR.

```bash
$ ./build.sh
```

A new file called `dist/anonymise.phar` will be available.


## Roadmap
[ ] Use symfony console component
[ ] Merge configs rather than replace the whole thing
[ ] Make folder selection regexable
[ ] Only .meta_no_index the top level directory
[ ] Allow an undo option (i.e., delete NO_INDEX_FILE in results)
