<?php

namespace Database\Seeders;

use App\Models\AiModel;
use App\Models\AlgorithmType;
use App\Models\ImplementationGuidance;
use App\Models\ResearchPaper;
use App\Models\Task;
use App\Models\UseCase;
use Illuminate\Database\Seeder;

class LinearRegressionSeeder extends Seeder
{
    public function run(): void
    {
        // Create algorithm type
        $algorithmType = AlgorithmType::create([
            'name' => 'Regression'
        ]);

        // Create tasks
        $tasks = [
            [
                'name' => 'Continuous Value Prediction',
                'description' => 'Predicting continuous numeric values based on input features. Linear regression excels at predicting quantitative outcomes like prices, measurements, or scores based on a set of input variables. It provides a mathematical function that maps input features to a continuous output value.'
            ],
            [
                'name' => 'Trend Analysis',
                'description' => 'Analyzing and forecasting trends in data. Linear regression can identify and quantify trends over time or across variables, making it valuable for understanding patterns in historical data and making future projections. It\'s particularly useful in business forecasting, economic analysis, and scientific research.'
            ],
            [
                'name' => 'Feature Importance Analysis',
                'description' => 'Understanding the relative importance of different features. Through its coefficients, linear regression provides clear insights into how much each input variable influences the outcome. This makes it an excellent tool for identifying which factors have the strongest impact on the target variable.'
            ],
            [
                'name' => 'Statistical Inference',
                'description' => 'Performing statistical inference on relationships between variables. Linear regression provides a framework for hypothesis testing, confidence interval estimation, and understanding the statistical significance of relationships between variables. This is crucial in research, economics, and scientific studies where understanding the reliability of relationships is important.'
            ],
            [
                'name' => 'Relationship Quantification',
                'description' => 'Quantifying relationships between dependent and independent variables. Linear regression provides precise mathematical measurements of how changes in one variable relate to changes in another, making it invaluable for understanding cause-and-effect relationships in various fields from economics to scientific research.'
            ],
            [
                'name' => 'Time Series Forecasting',
                'description' => 'Predicting future values based on historical time series data. While specialized time series models exist, linear regression can be adapted for time series analysis by incorporating time-based features, making it useful for simple forecasting tasks and establishing baseline predictions.'
            ]
        ];

        $taskIds = [];
        foreach ($tasks as $task) {
            $taskIds[] = Task::create($task)->id;
        }

        // Create use cases
        $useCases = [
            [
                'name' => 'Price Prediction',
                'description' => 'Predicting prices in real estate, stocks, etc.'
            ],
            [
                'name' => 'Sales Forecasting',
                'description' => 'Forecasting future sales based on historical data'
            ],
            [
                'name' => 'Scientific Relationship Modeling',
                'description' => 'Modeling relationships between variables in scientific research'
            ]
        ];

        $useCaseIds = [];
        foreach ($useCases as $useCase) {
            $useCaseIds[] = UseCase::create($useCase)->id;
        }

        // Create the Linear Regression model
        $markdownDescription = <<<EOT
Linear regression is a **supervised learning** algorithm used for predicting a continuous numeric outcome based on one or more input features ([Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=Linear%20regression%20is%20also%20a,3)).  It assumes a linear relationship between the independent variables \$X\$ and the dependent variable \$Y\$.

### Simple Linear Regression

The simplest case, **simple linear regression**, models this relationship with a line:

\$\$ Y = \beta_0 + \beta_1 X + \epsilon \$\$

where \$\beta_0\$ is the intercept, \$\beta_1\$ is the coefficient (slope) for the feature, and \$\epsilon\$ is an error term.

### Multiple Linear Regression

In **multiple linear regression**, the model extends to:

\$\$ Y = \beta_0 + \beta_1 X_1 + \beta_2 X_2 + \cdots + \beta_p X_p + \epsilon \$\$

This represents a linear combination of several features ([Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=general%20linear%20models%2C%20restricted%20to,for%20multiple%20linear%20regression%20is)).

### Goal and Methods

The goal is to find the parameters (\$\beta\$ coefficients) that **minimize the sum of squared errors** between the predicted and actual values of \$Y\$ ([Wikipedia](https://en.wikipedia.org/wiki/Least_squares#:~:text=In%20regression%20analysis%20%2C%20least,the%20points%20from%20the%20curve)).

This is typically done via:

*   **Ordinary Least Squares (OLS):**  \$\hat{\beta} = (X^T X)^{-1}X^T y\$ (closed-form solution)
*   **Iterative Optimization:** (e.g., gradient descent) for large datasets.

### Historical Context and Statistical Properties

The method of least squares dates back to Legendre (1805) and Gauss (1809) ([Wikipedia](https://en.wikipedia.org/wiki/Least_squares#:~:text=The%20least,4)), making linear regression one of the oldest and most studied models. Under certain assumptions, OLS produces the **best linear unbiased estimator (BLUE)** of the coefficients ([Wikipedia](https://en.wikipedia.org/wiki/Gauss%E2%80%93Markov_theorem#:~:text=In%20statistics%20%2C%20the%20Gauss%E2%80%93Markov,cannot%20be%20dropped%2C%20since%20biased)).

### Practical Value

Linear regression is valued for its **simplicity and interpretability**: each coefficient \$\beta_j\$ represents the expected change in \$Y\$ for a one-unit change in \$X_j\$, holding other factors constant.  It remains a fundamental tool for both prediction and inference ([Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=Linear%20regression%20is%20widely%20used,tools%20used%20in%20these%20disciplines)).
EOT;

        $model = AiModel::create([
            'algorithm_type_id' => $algorithmType->id,
            'name' => 'Linear Regression',
            'markdown_description' => $markdownDescription,
            
            'limitations' => "**Assumptions and Failure Cases:** Linear regression relies on several key assumptions about the data. First, it assumes a **linear relationship** between predictors and outcome – if the true relationship is nonlinear, a straight-line model will underfit and produce systematic errors ([Common pitfalls in statistical analysis: Linear regression analysis - PMC](https://pmc.ncbi.nlm.nih.gov/articles/PMC5384397/#:~:text=Regression%20analysis%20makes%20several%20assumptions%2C,regression%20analysis%20may%20be%20misleading)). Second, it assumes the **observations are independent** of each other; if data points are correlated (e.g. time series data or clustered samples), the standard OLS solution may no longer be optimal or statistically valid ([Common pitfalls in statistical analysis: Linear regression analysis - PMC](https://pmc.ncbi.nlm.nih.gov/articles/PMC5384397/#:~:text=Regression%20analysis%20makes%20several%20assumptions%2C,regression%20analysis%20may%20be%20misleading)). Another important assumption is **homoscedasticity** – the variance of the error term \\(\\epsilon\\) should be constant across all levels of the independent variables ([Five Key Assumptions of Linear Regression Algorithm - Dataaspirant](https://dataaspirant.com/assumptions-of-linear-regression-algorithm/#:~:text=The%20fifth%20assumption%20of%20linear,values%20of%20the%20independent%20variables)). When errors have non-constant variance (heteroscedasticity), OLS estimates remain unbiased but are no longer the most efficient (and statistical inference like confidence intervals becomes unreliable). Linear regression also typically assumes that the errors (residuals) are **normally distributed** around the true regression line (this is mainly important for constructing confidence intervals and hypothesis tests; the OLS estimates themselves still are BLUE without normality as long as other assumptions hold ([Gauss–Markov theorem - Wikipedia](https://en.wikipedia.org/wiki/Gauss%E2%80%93Markov_theorem#:~:text=In%20statistics%20%2C%20the%20Gauss%E2%80%93Markov,cannot%20be%20dropped%2C%20since%20biased))). Additionally, the model assumes **low multicollinearity** among predictors – if two or more features are highly correlated, it becomes difficult to distinguish their individual effects, leading to large standard errors for coefficients and unstable estimates (small changes in data can cause large swings in the fitted coefficients). While multicollinearity doesn't reduce overall predictive power, it undermines the interpretability of the coefficients and can make the model more sensitive to sampling noise. Another limitation is that linear regression is **sensitive to outliers**. Because it minimizes squared errors, a single extreme outlier can heavily influence the fit (pulling the line toward that point) ([Common pitfalls in statistical analysis: Linear regression analysis - PMC](https://pmc.ncbi.nlm.nih.gov/articles/PMC5384397/#:~:text=Regression%20analysis%20makes%20several%20assumptions%2C,regression%20analysis%20may%20be%20misleading)). Outliers can thus distort predictions and lead to misleading coefficients if not handled (for example, an anomalously high value of \\(Y\\) can dramatically increase the estimated slope). If the dataset contains a few such influential points, the model may effectively 'fail' to represent the typical trend ([Common pitfalls in statistical analysis: Linear regression analysis - PMC](https://pmc.ncbi.nlm.nih.gov/articles/PMC5384397/#:~:text=Regression%20analysis%20makes%20several%20assumptions%2C,regression%20analysis%20may%20be%20misleading)).\n\n" .
"**Where Linear Regression Fails:** Linear regression performs poorly when its fundamental assumptions are violated. In scenarios with a nonlinear relationship, a linear model will underfit – for instance, trying to fit a straight line to data that follow a quadratic curve will yield large errors and low \\(R^2\\). It also struggles with **complex interactions** between features unless those are explicitly included in the model. In high-dimensional settings (when the number of features \\(p\\) is close to or exceeds the number of observations \\(n\\)), ordinary least squares can overfit badly or even be impossible (if \\(p>n\\), the design matrix \\(X^T X\\) is singular and the normal equation can't be solved without regularization). OLS has no built-in mechanism for feature selection or regularization, so it will **overfit** in the presence of many predictors, especially if some are irrelevant. This can result in a model that fits the training data well but generalizes poorly to new data. Moreover, linear regression is not suitable for outcomes that are **categorical** (binary or multi-class outcomes) – using it in such cases (sometimes called a 'linear probability model' when applied to binary data) can lead to predictions outside the valid range (e.g. probabilities less than 0 or greater than 1) and typically violates the homoscedasticity assumption ([Assumptions of Logistic Regression - Statistics Solutions](https://www.statisticssolutions.com/free-resources/directory-of-statistical-analyses/assumptions-of-logistic-regression/#:~:text=First%2C%20logistic%20regression%20does%20not,an%20interval%20or%20ratio%20scale)). Another limitation is **extrapolation**: linear models can give unrealistic predictions if asked to forecast beyond the range of the training data. Since the model is unbounded (a line goes to \\(\\pm\\infty\\)), it may predict negative values for something that should be positive, or otherwise nonsensical outcomes, when \\(X\\) is outside the observed domain. For example, using a linear model for growth data and extrapolating far beyond the observed ages could predict negative height, which is clearly invalid. Finally, linear regression assumes that predictor variables are measured without error and that the model is correctly specified (no important predictors omitted, no superfluous ones included). Violations of these (omitted variable bias or measurement error in \\(X\\)) can also degrade performance: omitted relevant variables can cause bias in the coefficients of included variables, and including irrelevant variables can increase variance and yield unreliable estimates ([Common pitfalls in statistical analysis: Logistic regression - PMC](https://pmc.ncbi.nlm.nih.gov/articles/PMC5543767/#:~:text=The%20key%20to%20a%20successful,10%2C%20instead%20of%20the)). In summary, linear regression's weaknesses are most pronounced when dealing with **nonlinear relationships, heteroscedastic or autocorrelated errors, strong multicollinearity, outliers, and situations requiring categorical outputs or complex interactions**. In such cases, alternative modeling approaches or remedial measures are necessary to avoid misleading results.",
            
            'evaluation_metrics' => "For linear regression, which deals with continuous outcomes, evaluation metrics focus on the **error between predicted and actual values**. A common metric is the **Mean Squared Error (MSE)**, which is the average of the squared differences between predictions \\(\\hat{y}_i\\) and true values \\(y_i\\): \n\n\\[ \\text{MSE} = \\frac{1}{n}\\sum_{i=1}^n (\\hat{y}_i - y_i)^2. \\] \n\nMSE gives a sense of the model's overall prediction error in squared units of the output ([Mean squared error - Wikipedia](https://en.wikipedia.org/wiki/Mean_squared_error#:~:text=In%20statistics%2C%20the%20mean%20squared,of%20the%20errors%E2%80%94that%20is%2C)). Its square root, the **Root Mean Squared Error (RMSE)**, is often used as well, which brings the error back to the original units of \\(Y\\) (making it more interpretable as a kind of 'average error magnitude'). Another popular metric is the **Mean Absolute Error (MAE)**, the mean of the absolute differences \\(|\\hat{y}_i - y_i|\\). MAE is less sensitive to outliers than MSE (since it doesn't square the errors). In terms of goodness of fit, the **coefficient of determination** \\(R^2\\) is widely reported ([Coefficient of determination - Wikipedia](https://en.wikipedia.org/wiki/Coefficient_of_determination#:~:text=In%20statistics%2C%20the%20coefficient%20of,s)). \\(R^2\\) represents the proportion of variance in the dependent variable that is explained by the model ([Coefficient of determination - Wikipedia](https://en.wikipedia.org/wiki/Coefficient_of_determination#:~:text=In%20statistics%2C%20the%20coefficient%20of,s)). It ranges from 0 to 1 (or 0% to 100%), with higher values indicating a better fit (and an \\(R^2\\) of 1 meaning the model perfectly explains the data). Formally, \\(R^2 = 1 - \\frac{\\text{SSR}}{\\text{SST}}\\), where SSR is the sum of squared residuals and SST is the total sum of squares around the mean of \\(Y\\). An \\(R^2\\) of 0 means the model is no better than predicting the mean of \\(Y\\) for all observations, while an \\(R^2\\) of 0.7 would mean 70% of the variance in \\(Y\\) is accounted for by the model ([Coefficient of determination - Wikipedia](https://en.wikipedia.org/wiki/Coefficient_of_determination#:~:text=In%20statistics%2C%20the%20coefficient%20of,s)). It's important to note that \\(R^2\\) can be **misleading** in certain cases: adding more variables to a linear model will never decrease \\(R^2\\) (even if those variables are irrelevant), so one often looks at **Adjusted \\(R^2\\)** which penalizes model complexity.\n\nBeyond these, other metrics include the **Mean Squared Log Error** (useful when dealing with targets that span several orders of magnitude, by reducing the impact of large differences via log transform), and domain-specific measures like **Mean Absolute Percentage Error (MAPE)** if relative error is of interest. When comparing models, sometimes the **Akaike Information Criterion (AIC)** or **Bayesian Information Criterion (BIC)** is used (these combine model fit with a penalty for number of parameters). However, MSE (or RMSE) and \\(R^2\\) are usually the primary metrics for judging linear regression performance. For example, if we build a model to predict house prices, we might report that the model has an RMSE of \\$20,000 (meaning on average, predictions are off by \\$20k) and an \\(R^2\\) of 0.85 (85% of the variance in house prices is explained by the features in the model). In training, one might also examine the **residuals** (differences \\(y - \\hat{y}\\)) to check patterns – ideally, residuals should be structureless (no trends) and have constant variance; plots of residuals can also reveal outliers or heteroscedasticity.\n\nTo summarize, for regression tasks:\n- **MSE / RMSE**: indicate average prediction error (quadratic scoring, penalizing large errors heavily) ([Evaluating Regression Model Metrics in Python.md - GitHub](https://github.com/xbeat/Machine-Learning/blob/main/Evaluating%20Regression%20Model%20Metrics%20in%20Python.md#:~:text=Evaluating%20Regression%20Model%20Metrics%20in,penalizes%20larger%20errors%20more)).\n- **MAE**: indicates average magnitude of errors (linear scoring, more robust to outliers).\n- **R² (Coefficient of Determination)**: indicates the fraction of variance explained by the model ([Coefficient of determination - Wikipedia](https://en.wikipedia.org/wiki/Coefficient_of_determination#:~:text=In%20statistics%2C%20the%20coefficient%20of,s)).\n- **Adjusted R²**: like R² but adjusted for number of predictors (to prevent overestimating goodness-of-fit in over-parameterized models).\n- **Others**: MAPE, etc., depending on context.\n\nAn effective evaluation of a linear regression will often include reporting RMSE (or MAE) on a test set to quantify prediction error and R² to quantify goodness of fit. Low error and high R² are desired, but one must be cautious: a very high R² on training data could indicate overfitting, so cross-validation or test-set performance is crucial to ensure the model generalizes.",
            
            'training_data_description' => "Linear regression is designed to handle **numeric data** for the features (independent variables) and a **continuous numeric target**. Key points about data types:\n\n" .
                "- The dependent/response variable \\(Y\\) must be a continuous quantity (integers or real values). If \\(Y\\) is categorical, linear regression isn't appropriate (unless one is using it inappropriately as a linear probability model, which has issues as discussed).\n\n" .
                "- The independent variables \\(X_i\\) can be numeric (continuous or discrete). If some predictors are naturally categorical (e.g., gender, color, etc.), they need to be encoded into numeric form (dummy/indicator variables) to be included in a linear regression. Linear regression itself doesn't 'understand' categorical variables unless they are coded as 0/1 dummies or contrasts.\n\n" .
                "- Linear regression can handle binary features (0/1) just fine (it will assign a coefficient that adjusts the intercept when the feature is 1, effectively).\n\n" .
                "- It assumes the features are **quantitative** or at least ordered if treated as numeric. Using raw categorical IDs as numeric values would be a mistake (e.g., using 1 for 'red', 2 for 'blue', 3 for 'green' as if those were numeric values is not valid because the differences 2-1, 3-2 are not meaningful magnitudes). Proper encoding is needed for categorical data.\n\n" .
                "- Data can be of different types (int, float) as long as they are treated as numeric values by the model. Typically, one will use floating point representations for all features in linear regression implementations.\n\n" .
                "- Linear regression typically deals with **tabular data** (structured data) where each feature is a column and each observation is a row.\n\n" .
                "- It is not inherently suited to handle raw unstructured data like images, text, or audio in their native form. However, if you convert an image to numeric features (e.g., by flattening pixel intensities or using some image descriptors), you *could* plug those into a linear regression. Similarly, text data can be vectorized (like with TF-IDF scores for words) and then used in a linear model (this is essentially how linear models are applied in NLP tasks such as spam detection, though often with logistic regression for classification). But the caveat is that linear regression (for a continuous target) on such high-dimensional unstructured features may not be very effective unless the relationship truly is linear and noise is low.\n\n" .
                "- Linear regression expects that the input data is reasonably scaled/conditioned but it can work with values of different scales. However, extremely different scales might cause numerical issues when solving the normal equation (e.g., one feature in the order of millions and another around 0.001 could make matrix inversion unstable due to floating point precision). It's often a good practice to normalize or standardize features, but not a strict requirement of the model itself.\n\n" .
                "- It can handle missing data only if you preprocess (e.g., impute missing values or drop incomplete rows). Standard linear regression implementations do not accept NaNs or nulls.\n\n" .
                "- Regarding **data size**, linear regression can handle large datasets, but very large feature sets might be problematic for certain algorithms (due to inversion of a big matrix). For extremely high-dimensional data (e.g., genetics with tens of thousands of SNP features), one might use regularization (ridge regression) or specialized algorithms.\n\n" .
                "So, linear regression deals with:\n" .
                "- **Numeric features**: continuous (e.g., age, income), discrete (e.g., count of something), or binary/dummy (0/1) encodings of categorical attributes.\n" .
                "- **Continuous target variable**: something measured on an interval or ratio scale (height, weight, price, temperature, etc.).\n\n" .
                "For example, if predicting weight from height and gender: height is numeric, gender would be encoded as a binary variable (say 0 for male, 1 for female), and weight (the target) is numeric. This data is perfectly suitable for linear regression (height and gender as inputs, weight as output). If the data were something like predicting 'pass/fail' from study hours, that's a binary target so we'd use logistic instead.\n\n" .
                "A note: if the target is count data (non-negative integers), one might still use linear regression, but often a Poisson regression (which is another GLM) is more appropriate. Similarly, if the target is bounded between 0 and 1 (like a percentage), linear regression might predict values outside this range, so one might transform the target or use a specialized method. But linear regression in its plain form doesn't inherently know the range of Y aside from what it learns from data.\n\n" .
                "In summary, **tabular numerical data with a continuous outcome** is the ideal scenario for linear regression. Categorical inputs must be converted to numerical dummy variables ([Simple Linear Regression | An Easy Introduction & Examples](https://www.scribbr.com/statistics/simple-linear-regression/#:~:text=Simple%20linear%20regression%20is%20used,when%20you%20want%20to%20know)), and the model is not natively applicable to non-numeric or unstructured input without feature extraction. If the question of 'data types' refers to data format, it can handle vectors, matrices of numeric values, etc., which is what most libraries expect (e.g., a NumPy array or pandas DataFrame of floats/ints).",
            
            'algorithm_description' => "Linear regression falls under the category of **supervised learning** (specifically, supervised regression). It is a **classical (non-deep) machine learning** algorithm and also a fundamental technique in statistics. Key characteristics of its type:\n\n" .
                "- It is a **parametric model**: it assumes a specific form for the function (a linear combination of inputs) and learns the parameters (coefficients). There are \\(p+1\\) parameters (for \\(p\\) features plus an intercept) in the simple case.\n\n" .
                "- It is not a deep learning method; it has no hidden layers or complex architecture – just a direct mapping from inputs to output via a linear function.\n\n" .
                "- It uses **batch learning** (in ordinary form) meaning it typically looks at the whole dataset (or can be applied in closed-form). There are stochastic gradient descent versions which can be incremental, but the model form is static (doesn't change structure with data).\n\n" .
                "- Linear regression can be derived from a **probabilistic perspective** too: assuming a normal distribution of errors leads to the least squares solution being equivalent to maximum likelihood estimation. In that sense, it's also a simple case of a Gaussian likelihood model.\n\n" .
                "- In terms of learning type: definitely **supervised**, because it requires example input-output pairs to learn the relationship and minimize error ([Linear regression - Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=Linear%20regression%20is%20also%20a,3)). There is no notion of unsupervised learning in basic linear regression.\n\n" .
                "- It's one of the simplest **machine learning algorithms** conceptually, often considered a baseline. As noted in Wikipedia ([Linear regression - Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=Linear%20regression%20is%20also%20a,3)), linear regression is indeed regarded as a supervised machine learning algorithm that learns an optimized linear function from labeled data.\n\n" .
                "- It's not an ensemble or meta-algorithm either (like boosting or bagging); it's a single model method.\n\n" .
                "- Historically, linear regression is rooted in statistics (Gauss, Legendre), but in ML taxonomy, it's a supervised learning regression algorithm.\n\n" .
                "So, if categorizing:\n" .
                "- **Learning paradigm:** Supervised learning (needs labeled training data).\n" .
                "- **Type of task:** Regression.\n" .
                "- **Model family:** Generalized Linear Model (specifically identity link, Gaussian error). It's also a **least squares method**.\n" .
                "- **Parametric vs non-parametric:** Parametric (fixed number of parameters determined by number of features; doesn't grow with dataset size).\n" .
                "- **Analytical vs iterative solution:** Could be either (analytical normal equation solution, or iterative gradient descent solution).\n" .
                "- **Interpretable and explainable:** Yes, largely, due to linear nature.\n" .
                "- **Not deep learning:** It has no multi-layer structure, and no feature learning beyond fitting coefficients.\n\n" .
                "In summary, linear regression is a **supervised, parametric regression algorithm**. It's a fundamental building block taught in both machine learning and statistics due to its simplicity and well-understood properties.",
            
            'tasks_description' => "Linear regression is inherently designed for **regression tasks**, where the goal is to predict a continuous numerical value. It is not suitable for classification or clustering out of the box. Thus:\n\n" .
                "- **Task Type:** Regression (supervised). The model learns from labeled examples with continuous targets and predicts a continuous outcome for new data.\n" .
                "- It is *not* used for classification (for classification, one would use logistic regression or other classifiers instead), and it's not an unsupervised method (it requires target values to learn).\n" .
                "- It also doesn't perform clustering or density estimation.\n\n" .
                "In summary, linear regression addresses *supervised regression* problems – any scenario where we have input features and a continuous output variable. Examples include predicting prices, amounts, scores, etc. If you attempted to use linear regression for a classification task by encoding classes as numbers, you'd run into issues (predictions may fall outside the class labels, and assumptions like normal residuals would fail). Instead, classification tasks are handled by models like logistic regression, decision trees, etc. Linear regression also isn't appropriate for structured outputs (like sequences or rankings) without modification.\n\n" .
                "One could consider a scenario like **time-series forecasting** as a regression task (predict next month's sales), and linear regression can be applied there (with caution about autocorrelation). But primarily, linear regression = regression task.\n\n" .
                "Some specific use cases include:\n\n" .
                "**Economics and Finance:**\n" .
                "- Linear regression (often under the umbrella of *econometrics*) is heavily used to model relationships between economic variables. For example, it's used to predict **consumption spending** from income levels ([Linear regression - Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=Economics)), or to estimate the impact of interest rates on investment.\n" .
                "- The **Capital Asset Pricing Model (CAPM)** in finance is essentially a linear regression that relates the return of an asset to the return of the market (to compute the asset's beta) ([Linear regression - Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=)).\n" .
                "- Analysts use linear models to quantify **systematic risk** (beta is the slope of the regression of asset returns on market returns) ([Linear regression - Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=The%20capital%20asset%20pricing%20model,return%20on%20all%20risky%20assets)).\n" .
                "- Economists also use linear regression to tease out relationships from observational data; for instance, early studies linking **tobacco smoking to mortality** used regression analysis with multiple variables to control for confounders ([Linear regression - Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=Early%20evidence%20relating%20tobacco%20smoking,those%20other%20%20340%20socio)).\n\n" .
                "**Science and Engineering:**\n" .
                "- Many natural or physical relationships are approximated linearly for certain ranges.\n" .
                "- In **chemistry or biology**, linear regression is used to create **calibration curves** – e.g., relating the concentration of a substance to an instrument reading (absorbance in spectrophotometry, etc.).\n" .
                "- In epidemiology and public health, regression is used to estimate associations (like the impact of an exposure on health outcome controlling for age, etc.).\n" .
                "- In **environmental science**, one might use linear regression to model how temperature affects yield of a chemical process, or how pollutant emissions relate to temperature and pressure.\n" .
                "- Linear regression is also used in **geosciences** (e.g., relating seismic readings to earthquake magnitudes) and **astronomy** (the classical example being fitting the HR diagram relations, or the Hubble's law relating galaxy recessional velocity to distance).\n\n" .
                "**Machine Learning and Data Mining:**\n" .
                "- While linear regression is simple, it serves as a baseline for many regression problems.\n" .
                "- For tasks like **house price prediction**, **sales forecasting**, or **customer valuation**, a linear model is often the first approach due to its interpretability.\n" .
                "- Even if ultimately more complex models are used, linear regression helps set an expectation.\n" .
                "- In business analytics, linear trends (trend lines) are often fitted to time series data to understand growth or decline over time ([Linear regression - Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=Main%20article%3A%20Trend%20estimation)) (though for time series specifically, one has to be careful with autocorrelation).\n" .
                "- In the **social sciences**, linear regression is widely applied to analyze survey data or observational data – for example, studying how education and experience affect income, or how different factors influence test scores.\n" .
                "- It's one of the **most important tools in biological, behavioral, and social sciences** for describing relationships ([Linear regression - Wikipedia](https://en.wikipedia.org/wiki/Linear_regression#:~:text=Linear%20regression%20is%20widely%20used,tools%20used%20in%20these%20disciplines)).\n\n" .
                "**Real-world Examples:**\n" .
                "- *Real Estate:* Predicting house prices from features like square footage, number of bedrooms, location, etc. A linear regression can give an estimate of how much each extra bedroom or each additional 100 square feet contributes to price.\n" .
                "- *Manufacturing:* Modeling the relationship between input variables and output quality/yield. For instance, predicting the strength of material produced given temperature, pressure, and humidity in the process.\n" .
                "- *Marketing:* Understanding how advertising spend in various channels (TV, online, print) relates to sales. A linear model can highlight the marginal contribution of each channel (as long as effects are roughly linear in spend).\n" .
                "- *Medicine:* In some cases, linear regression is used for prediction or association – for example, predicting blood pressure from age and weight. However, for binary outcomes (disease yes/no) logistic regression is more appropriate.\n" .
                "- *Engineering:* Fitting linear models to sensor data – e.g., a linear calibration for a sensor's output vs the true value.\n\n" .
                "Linear regression's strength is in scenarios where the underlying trend is expected to be linear or near-linear and where **interpretability** is important. Decision makers often prefer a simple linear equation that they can understand (even if a complex model might fit better). Moreover, linear models are fast to train and require relatively little data compared to more complex models. In the era of big data, linear regression remains relevant – for example, **forecasting** problems in tech companies might start with a linear trend + seasonal effects model. Even in advanced machine learning pipelines, linear regression appears as a component (e.g., the final layer of a neural network for regression is essentially a linear combination). Finally, linear regression is used for **control and calibration** – many devices and protocols rely on linear models to convert measured signals to calibrated values (because linear functions are easy to invert and interpret).\n\n" .
                "In summary, whenever one has a continuous outcome and wants either a quick predictive model or to quantify the influence of factors, linear regression is often the first and a very effective tool. It has been applied in fields from agriculture to zoology – basically anywhere relationships between quantitative variables are studied.",
            
            'related_models_description' => "Linear regression has several key related models and extensions:\n\n" .
                "1. **Direct Extensions**:\n" .
                "   - Ridge Regression (L2 regularization)\n" .
                "   - Lasso Regression (L1 regularization)\n" .
                "   - Elastic Net (combined L1/L2)\n" .
                "   - Polynomial Regression\n\n" .
                "2. **Generalized Linear Models (GLMs)**:\n" .
                "   - Logistic Regression\n" .
                "   - Poisson Regression\n" .
                "   - Negative Binomial Regression\n\n" .
                "3. **Robust Alternatives**:\n" .
                "   - Robust Regression\n" .
                "   - Quantile Regression\n" .
                "   - Huber Regression\n\n" .
                "4. **Modern Variants**:\n" .
                "   - Bayesian Linear Regression\n" .
                "   - Sparse Linear Models\n" .
                "   - Online Learning Variants",
            
            'is_gpu_accelerated' => false,
            'interpretability_score' => 10,
            'interpretability_explanation' => "Linear regression offers exceptional interpretability:\n\n" .
                "1. **Coefficient Interpretation**:\n" .
                "   - Each coefficient represents change in Y per unit change in X\n" .
                "   - Direction (positive/negative) shows relationship\n" .
                "   - Magnitude indicates importance\n\n" .
                "2. **Statistical Inference**:\n" .
                "   - p-values for significance testing\n" .
                "   - Confidence intervals for coefficients\n" .
                "   - R² for overall model fit\n\n" .
                "3. **Visual Interpretation**:\n" .
                "   - Clear geometric interpretation\n" .
                "   - Residual plots for diagnostics\n" .
                "   - Feature importance visualization\n\n" .
                "4. **Business Understanding**:\n" .
                "   - Easy to explain to stakeholders\n" .
                "   - Clear impact quantification\n" .
                "   - Transparent decision process",
            
            'training_data_size_estimate' => 'Varies by complexity: Minimum 20 samples, ideally 10+ samples per feature. For p features, recommended n > 10p',
            'date_added' => now(),
            'date_updated' => now(),
            'license' => 'Open Source',
            'maintainers_authors' => 'Various - Standard Statistical/ML Algorithm',
        ]);

        // Attach tasks and use cases
        $model->tasks()->attach($taskIds);
        $model->useCases()->attach($useCaseIds);

        // Create Research Papers
        $papers = [
            [
                'title' => 'Nouvelles méthodes pour la détermination des orbites des comètes',
                'authors' => 'Adrien-Marie Legendre',
                'publication_date' => '1805-01-01',
                'url' => 'https://en.wikipedia.org/wiki/Least_squares#History'
            ],
            [
                'title' => 'Theoria Motus',
                'authors' => 'Carl Friedrich Gauss',
                'publication_date' => '1809-01-01',
                'url' => 'https://en.wikipedia.org/wiki/Least_squares#History'
            ],
            [
                'title' => 'Regression Towards Mediocrity in Hereditary Stature',
                'authors' => 'Sir Francis Galton',
                'publication_date' => '1886-01-01',
                'url' => 'https://en.wikipedia.org/wiki/Linear_regression#History'
            ],
            [
                'title' => 'On the Mathematical Foundations of Theoretical Statistics',
                'authors' => 'R. A. Fisher',
                'publication_date' => '1922-01-01',
                'url' => 'https://en.wikipedia.org/wiki/Linear_regression#History'
            ],
            [
                'title' => 'Ridge Regression: Biased Estimation for Nonorthogonal Problems',
                'authors' => 'A.E. Hoerl, R.W. Kennard',
                'publication_date' => '1970-01-01',
                'url' => 'https://en.wikipedia.org/wiki/Ridge_regression#History'
            ],
            [
                'title' => 'Regression Shrinkage and Selection via the Lasso',
                'authors' => 'R. Tibshirani',
                'publication_date' => '1996-01-01',
                'url' => 'https://en.wikipedia.org/wiki/Lasso_(statistics)#History'
            ]
        ];

        $paperIds = [];
        foreach ($papers as $paper) {
            $paperIds[] = ResearchPaper::create($paper)->id;
        }
        $model->researchPapers()->attach($paperIds);

        // Create Implementation Guidance
        ImplementationGuidance::create([
            'title' => 'Linear Regression Implementation Guide',
            'description' => 'Comprehensive guide for implementing linear regression effectively',
            'best_practices' => "1. **Data Preparation Best Practices**:\n" .
                "- Scale features if using gradient descent\n" .
                "- Handle missing values appropriately\n" .
                "- Check for and handle outliers\n" .
                "- Encode categorical variables\n" .
                "- Check for multicollinearity\n" .
                "- Consider feature transformations\n\n" .
                "2. **Model Development Best Practices**:\n" .
                "- Start with simple linear regression\n" .
                "- Add features incrementally\n" .
                "- Use cross-validation\n" .
                "- Check assumptions\n" .
                "- Consider regularization\n" .
                "- Monitor for overfitting\n\n" .
                "3. **Evaluation Best Practices**:\n" .
                "- Use multiple metrics (RMSE, R², MAE)\n" .
                "- Analyze residuals thoroughly\n" .
                "- Validate on test set\n" .
                "- Check prediction intervals\n" .
                "- Assess feature importance\n" .
                "- Compare against baselines",
            
            'code_example' => "```python\n" .
                "import numpy as np\n" .
                "from sklearn.linear_model import LinearRegression\n" .
                "from sklearn.model_selection import train_test_split\n" .
                "from sklearn.preprocessing import StandardScaler\n" .
                "from sklearn.metrics import mean_squared_error, r2_score\n\n" .
                "# Prepare data\n" .
                "scaler = StandardScaler()\n" .
                "X_scaled = scaler.fit_transform(X)\n" .
                "X_train, X_test, y_train, y_test = train_test_split(X_scaled, y, test_size=0.2)\n\n" .
                "# Create and train model\n" .
                "model = LinearRegression()\n" .
                "model.fit(X_train, y_train)\n\n" .
                "# Make predictions\n" .
                "y_pred = model.predict(X_test)\n\n" .
                "# Evaluate\n" .
                "mse = mean_squared_error(y_test, y_pred)\n" .
                "rmse = np.sqrt(mse)\n" .
                "r2 = r2_score(y_test, y_pred)\n\n" .
                "# Print coefficients and metrics\n" .
                "print('Coefficients:', model.coef_)\n" .
                "print('Intercept:', model.intercept_)\n" .
                "print(f'RMSE: {rmse:.2f}')\n" .
                "print(f'R²: {r2:.2f}')\n\n" .
                "# Residual analysis\n" .
                "residuals = y_test - y_pred\n" .
                "```\n\n" .
                "```R\n" .
                "# R implementation\n" .
                "model <- lm(y ~ ., data=training_data)\n" .
                "summary(model)\n" .
                "plot(model)  # diagnostic plots\n" .
                "```",
            
            'performance_benchmarks' => "Performance characteristics:\n\n" .
                "1. **Computational Complexity**:\n" .
                "   - Training (OLS): O(np²) time, O(p²) space\n" .
                "   - Training (GD): O(npi) where i = iterations\n" .
                "   - Prediction: O(p) per sample\n" .
                "   where n = samples, p = features\n\n" .
                "2. **Memory Usage**:\n" .
                "   - Design matrix: O(np)\n" .
                "   - Covariance matrix: O(p²)\n" .
                "   - Total: O(np + p²)\n\n" .
                "3. **Scaling Behavior**:\n" .
                "   - Excellent for p << n\n" .
                "   - Challenges when p > n\n" .
                "   - Linear scaling with n in GD\n\n" .
                "4. **Optimization Speed**:\n" .
                "   - Fast convergence for OLS\n" .
                "   - GD depends on learning rate\n" .
                "   - Mini-batch for large datasets",
            
            'implementation_steps' => "Detailed implementation steps:\n\n" .
                "1. **Data Preprocessing**:\n" .
                "   - Load and clean data\n" .
                "   - Handle missing values\n" .
                "   - Remove outliers\n" .
                "   - Scale features\n" .
                "   - Split train/test\n\n" .
                "2. **Feature Engineering**:\n" .
                "   - Create polynomial features\n" .
                "   - Handle categorical variables\n" .
                "   - Create interaction terms\n" .
                "   - Select relevant features\n\n" .
                "3. **Model Implementation**:\n" .
                "   - Choose solver (OLS/GD)\n" .
                "   - Initialize parameters\n" .
                "   - Implement cost function\n" .
                "   - Add regularization\n\n" .
                "4. **Training Process**:\n" .
                "   - Fit model\n" .
                "   - Monitor convergence\n" .
                "   - Validate assumptions\n" .
                "   - Check performance\n\n" .
                "5. **Evaluation**:\n" .
                "   - Calculate metrics\n" .
                "   - Analyze residuals\n" .
                "   - Check coefficients\n" .
                "   - Cross-validate\n\n" .
                "6. **Deployment**:\n" .
                "   - Save model\n" .
                "   - Create prediction pipeline\n" .
                "   - Document assumptions\n" .
                "   - Monitor performance",
            
            'optimization_tips' => "Optimization strategies:\n\n" .
                "1. **Computational Optimization**:\n" .
                "   - Use vectorized operations\n" .
                "   - Leverage BLAS/LAPACK\n" .
                "   - Consider sparse matrices\n" .
                "   - Use mini-batch processing\n\n" .
                "2. **Memory Optimization**:\n" .
                "   - Stream large datasets\n" .
                "   - Use efficient data types\n" .
                "   - Clear unnecessary objects\n" .
                "   - Monitor memory usage\n\n" .
                "3. **Numerical Stability**:\n" .
                "   - Scale features appropriately\n" .
                "   - Use QR decomposition\n" .
                "   - Handle singular matrices\n" .
                "   - Check condition number\n\n" .
                "4. **Performance Tuning**:\n" .
                "   - Profile code\n" .
                "   - Optimize bottlenecks\n" .
                "   - Use appropriate solvers\n" .
                "   - Batch predictions",
            
            'debugging_guidance' => "Common issues and solutions:\n\n" .
                "1. **High Error**:\n" .
                "   - Check feature scaling\n" .
                "   - Look for outliers\n" .
                "   - Verify linearity assumption\n" .
                "   - Consider feature engineering\n\n" .
                "2. **Poor Generalization**:\n" .
                "   - Add regularization\n" .
                "   - Reduce feature complexity\n" .
                "   - Increase training data\n" .
                "   - Check for data leakage\n\n" .
                "3. **Numerical Issues**:\n" .
                "   - Handle multicollinearity\n" .
                "   - Scale features\n" .
                "   - Check matrix condition\n" .
                "   - Use stable solvers\n\n" .
                "4. **Implementation Issues**:\n" .
                "   - Verify data pipeline\n" .
                "   - Check for NaN/Inf\n" .
                "   - Validate input shapes\n" .
                "   - Test edge cases",
            
            'deployment_considerations' => "Deployment checklist:\n\n" .
                "1. **Model Serialization**:\n" .
                "   - Save model parameters\n" .
                "   - Store scaling factors\n" .
                "   - Document feature order\n" .
                "   - Version control\n\n" .
                "2. **Input Validation**:\n" .
                "   - Check data types\n" .
                "   - Verify value ranges\n" .
                "   - Handle missing data\n" .
                "   - Validate transformations\n\n" .
                "3. **Performance Monitoring**:\n" .
                "   - Track prediction accuracy\n" .
                "   - Monitor data drift\n" .
                "   - Log system metrics\n" .
                "   - Set up alerts\n\n" .
                "4. **Maintenance**:\n" .
                "   - Schedule retraining\n" .
                "   - Update documentation\n" .
                "   - Backup models\n" .
                "   - Review performance",
            
            'ai_model_id' => $model->id
        ]);
    }
} 