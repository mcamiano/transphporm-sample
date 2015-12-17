This is a sample based on the Level-2 Transphporm PHP template system (https://github.com/Level-2/Transphporm).

The package takes an approach similar to transforms built with a functional language, such as XSLT. 
A number of Javascript templating tools seem to take a similar approach.

I haven't played with it enough to make a good evaluation.
The primary appeal of using a transformation-based approach, is that the concerns of form, style, and transform logic are separable.
Syntactic benefits vs a language such as XSLT is that it has much less. Syntax, that is.

A possible downside is similar to a transformational approach, in that the separation of the logic from the exemplar template,
makes certain 2nd- and higher order constructions more difficult to express. Loops, for instance, require a special operator in the transform.
That isn't too big of a problem until you start proliferating special operators, and need to express higher order constructions. 
It may even be considered a feature, because it forces more logical semantics out of the transform.
