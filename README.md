## How to deploy with local computer (Manual)

### Step 1
Clone from this repository "fp-sisop"
### Step 2
Make Docker file that satisfy both your source code and the virtual private server
### Step 3
Make Terraform that satify both your source code and the virtual private server
### Step 4
Run `make` in your terminal, this will run series of command in your terminal.

### What is inside makefile?
-

## How to deploy with Github action (CI/CD)
(The use case is using Google Cloud Service)

### Step 1 
 Generate key in service account in "I am Admin", and make sure that your service account have access to your instance
> Make sure you minify (make the key in one line) the key because the github secret engine is unable to read a key with space break
### Step 2 
 Upload your key to Github Secrets 
> Make sure that you name the keyname in Github Secrets same as the one in .github/workflows
### Step 3
Setup your environment in Github Secrets with 

 ```
PROJECT_ID: fp-sisop
REGION: asia-southeast2
 GAR_LOCATION: asia-southeast2-docker.pkg.dev/fp-sisop/itsparking/itsparking:latest
```
> PROJECET_ID is
> REGION is 
> GAR_LOCATION is

### Step 4
 Continue your development and when you are finished just simply push your source code to `main`. This will automatically trigger github action to deploy and test in your google cloud run then  your code that eventually accessible to public
