/*package quickstart;

public class HelloWorld {
    public static void main(String[] args){
        System.out.println("Hello, World!");
    }
}*/
package quickstart;

public class MySqrt {
    public static double getSqureRoot(int n, double deltaThreshold, int maxTry){
        if(n <= 1){
            return -1.0;
        }
        double min = 1.0, max = (double)n;
        for(int i = 0; i < maxTry; i++){
            double middle = (min + max) / 2;
            double square = middle * middle;
            double delta = Math.abs((square / n) -1);
            if(delta <= deltaThreshold){
                return middle;
            }else {
                if(square > n){
                    max = middle;
                }else{
                    min = middle;
                }
            }
        }
        return -2.0;

    }
}
public  static void main(String[] args){
    int number = 10;
    double squareRoot = MySqrt.getSqureRoot(number, 0.000001, 10000);
    if(squareRoot == 1.0){
        System.out.println("pls input gt 1 integer");
    }else if(squareRoot == 2.0){
        System.out.println("no result");
    }else{
        System.out.println(String.format("%d 's squart is %f", number, squareRoot));
    }
}

