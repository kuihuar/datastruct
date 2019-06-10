//
//  ExtenSort.hpp
//  cppsort
//
//  Created by Jianfen Liu on 2019/1/17.
//  Copyright © 2019年 Jianfen Liu. All rights reserved.
//

#ifndef ExtenSort_hpp
#define ExtenSort_hpp

#include <stdio.h>

#endif /* ExtenSort_hpp */

class ExtenSort{
public:
    ExtenSort(const char *in, const char *out, int m);
    ~ExtenSort();
    int sort();
private:
    char *file_in;
    char *file_out;
    void qsort(int *a, int s, int e);
    
};
