```
  _________             .__       .__     _______          __                       __
 /   _____/ ____   ____ |__|____  |  |    \      \   _____/  |___  _  _____________|  | __
 \_____  \ /  _ \_/ ___\|  \__  \ |  |    /   |   \_/ __ \   __\ \/ \/ /  _ \_  __ \  |/ /
 /        (  <_> )  \___|  |/ __ \|  |__ /    |    \  ___/|  |  \     (  <_> )  | \/    <
/_______  /\____/ \___  >__(____  /____/ \____|__  /\___  >__|   \/\_/ \____/|__|  |__|_ \
        \/            \/        \/               \/     \/                              \/
```

# Git cheat sheet (learning git on steroids).

### Conventions:

`[some_text]`: this is to be replaced as whole with some other text that makes
sense and doesn't include space in it.

### List all available branches

```
	git branch
```

### Find current branch you are working on

```
	git branch | grep \*
```
Explanation: the `git branch` list all existing branch we want to find the
branch that is marked with `*`, the `grep \*` normally takes multi-line text as
input and output only the lines that contains a `*`, the `|` means redirect the
output of `git branch` to stdin of `grep \*`

### Create new branch

```
	git checkout -b [BRANCH_NAME]
```

### Push current working branch to online server

```
	git push origin [BRANCH_NAME]
```
Note: please not that `[BRANCH_NAME]` doesn't necessarily have to be the same
name as current working branch, still it is a good convention to follow.

### List all files uncommitted changes

```
	git status
```

### List all uncommitted changes 

```
	git diff
```

### Tracked new file/folder

```
	git add [FILE_OR_FOLDER_RELATIVE_PATH]
```

### pull a branch and automatically merge it to current working branch

```
	git pull origin [BRANCH_NAME_ON_GITHUB]
```
