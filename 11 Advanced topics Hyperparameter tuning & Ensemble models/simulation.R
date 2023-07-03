---
title: "R Notebook"
output: html_notebook
---

Using sss.split, we've got five splits of data, which contains training data and testing data
After that, we apply svm to our training dataset to train the model, and we validate the performance using features of testing data to predict the ground truth of testing data.

We can note that every single prediction is a bernoulli experiment, that is, we get either a success or a failure in each trial. In a sequence of 15 testing datas, it's a Binomial with parameters n = 15 and a unknown p.
Because of the five splits of data, we get five realizations of the Binomial random variable.
We set Xbar_5 to the mean of the accuracy of these five validations, as an estimator of the mean of the Binomial distribution. In order to access the unknown p, we derive the distribution of this proportion from dividing the Binomial random variable by 15. So the estimator of p, phat, by CLT, is a random variable N ~ (p, $p(1-p)/n$)


```{r}
xbar_5 = c()
for (i in 1:1000000){
  xbar <- mean(rbinom(5,15,0.8)) # mean ac of five splits in sss.split(X,Y)
  xbar_5[i] <- xbar
}
hist(xbar_5, breaks = 40)


```

Add a new chunk by clicking the *Insert Chunk* button on the toolbar or by pressing *Ctrl+Alt+I*.

When you save the notebook, an HTML file containing the code and output will be saved alongside it (click the *Preview* button or press *Ctrl+Shift+K* to preview the HTML file).

The preview shows you a rendered HTML copy of the contents of the editor. Consequently, unlike *Knit*, *Preview* does not run any R code chunks. Instead, the output of the chunk when it was last run in the editor is displayed.
