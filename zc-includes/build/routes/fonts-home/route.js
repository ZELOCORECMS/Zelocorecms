// routes/fonts-home/route.ts
import { redirect } from "@zelocorecms/route";
var route = {
  beforeLoad: () => {
    throw redirect({
      throw: true,
      to: "/font-list"
    });
  }
};
export {
  route
};
